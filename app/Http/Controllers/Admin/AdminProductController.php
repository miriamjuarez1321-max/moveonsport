<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\StorePrendaRequest;
use App\Models\VarianteProducto;

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
            
            // Validar suma de stock para Tenis
            if (isset($data['tipo']) && strtolower($data['tipo']) == 'tenis' && $request->has('variantes_stock')) {
                $totalStock = $data['stock'] ?? 0;
                $sumVariantes = array_sum($request->variantes_stock);
                if ($sumVariantes > $totalStock) {
                    return back()->withInput()->with('error', 'La suma de stock por número excede el stock total disponible.');
                }
            }

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
            } elseif (strtolower($prenda->tipo) != 'tenis') {
                // Si no es tenis y no hay tallas seleccionadas, eliminar todas las tallas
                $prenda->tallas()->delete();
            }

            // Actualizar variantes dinámicas (Tenis)
            if (strtolower($prenda->tipo) == 'tenis') {
                $prenda->variantes()->delete();

                if ($request->has('variantes_numero')) {
                    $variantesArray = [];
                    foreach ($request->variantes_numero as $index => $numero) {
                        $stock = $request->variantes_stock[$index] ?? 0;
                        if (!empty($numero)) {
                            $prenda->variantes()->create([
                                'tipo' => 'numero',
                                'valor' => $numero,
                                'stock' => $stock
                            ]);
                            $variantesArray[] = $numero;
                        }
                    }
                    // Actualizar campo talla para fallback en cards
                    $prenda->update(['talla' => implode(', ', $variantesArray)]);
                }
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
