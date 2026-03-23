<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\StorePrendaRequest;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Prenda::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function show(Prenda $prenda)
    {
        return view('admin.products.show', compact('prenda'));
    }

    public function edit(Prenda $prenda)
    {
        return view('admin.products.form', compact('prenda'));
    }

    public function update(StorePrendaRequest $request, Prenda $prenda)
    {
        try {
            $data = $request->validated();
            unset($data['imagen']);

            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior si existe
                if ($prenda->imagen) {
                    Storage::disk('public')->delete($prenda->imagen);
                }
                $data['imagen'] = $request->file('imagen')->store('prendas', 'public');
            }

            $prenda->update($data);

            // Actualizar stock por tallas
            if ($request->has('tallas_selected')) {
                // Sincronizar tallas: Eliminar las que no están seleccionadas y actualizar las que sí
                $prenda->tallas()->whereNotIn('talla', $request->tallas_selected)->delete();

                foreach ($request->tallas_selected as $talla) {
                    $stock = $request->stocks[$talla] ?? 0;
                    $prenda->tallas()->updateOrCreate(
                        ['talla' => $talla],
                        ['stock' => $stock]
                    );
                }
            } else {
                // Si no hay ninguna seleccionada, eliminar todas las tallas
                $prenda->tallas()->delete();
            }

            return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error actualizando producto: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Error inesperado al actualizar el producto.');
        }
    }

    public function destroy(Prenda $prenda)
    {
        try {
            if ($prenda->imagen) {
                Storage::disk('public')->delete($prenda->imagen);
            }
            $prenda->delete();

            return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error eliminando producto: ' . $e->getMessage());
            return back()->with('error', 'Error inesperado al eliminar el producto.');
        }
    }
}
