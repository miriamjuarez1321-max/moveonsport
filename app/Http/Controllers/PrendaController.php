<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prenda;
use App\Http\Requests\StorePrendaRequest;
use Illuminate\Support\Facades\Log;

class PrendaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        $query = Prenda::query();

        if ($search) {
            // Limpiar la búsqueda de palabras vacías
            $cleanSearch = str_ireplace([' de ', ' para ', ' la ', ' el ', ' los ', ' las ', ' un ', ' una ', ' y '], ' ', ' ' . $search . ' ');
            // Filtrar espacios vacíos y obtener un arreglo con los términos útiles
            $terms = array_filter(explode(' ', trim($cleanSearch)));

            $query->where(function ($q) use ($terms) {
                foreach ($terms as $term) {
                    $q->where(function ($subQ) use ($term) {
                        $subQ->where('nombre', 'LIKE', "%{$term}%")
                             ->orWhere('descripcion', 'LIKE', "%{$term}%")
                             ->orWhere('categoria', 'LIKE', "%{$term}%")
                             ->orWhere('tipo', 'LIKE', "%{$term}%");
                    });
                }
            });
        }

        $prendas = $query->latest()->paginate(12);

        return view('collections.index', compact('prendas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categoria = $request->query('categoria', 'hombre'); // Default to hombre if not provided
        return view('admin.products.form', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrendaRequest $request)
    {
        try {
            $validated = $request->validated();

            // Validar suma de stock para Tenis
            if (isset($validated['tipo']) && strtolower($validated['tipo']) == 'tenis' && $request->has('variantes_stock')) {
                $totalStock = $validated['stock'] ?? 0;
                $sumVariantes = array_sum($request->variantes_stock);
                if ($sumVariantes > $totalStock) {
                    return back()->withInput()->with('error', 'La suma de stock por número excede el stock total disponible.');
                }
            }

            if ($request->hasFile('imagen')) {
                // Guarda la imagen en storage/app/public/prendas
                $path = $request->file('imagen')->store('prendas', 'public');
                $validated['imagen'] = $path;
            }

            $prenda = Prenda::create($validated);

            // Guardar stock por tallas (Ropa)
            if ($request->has('tallas_selected') && strtolower($prenda->tipo) != 'tenis') {
                foreach ($request->tallas_selected as $talla) {
                    $stock = $request->stocks[$talla] ?? 0;
                    $prenda->tallas()->create([
                        'talla' => $talla,
                        'stock' => $stock
                    ]);
                }
            }

            // Actualizar variants dinámicas (Tenis)
            if (strtolower($prenda->tipo) == 'tenis' && $request->has('variantes_numero')) {
                $variantesArray = [];
                foreach ($request->variantes_numero as $idx => $numero) {
                    $stock = $request->variantes_stock[$idx] ?? 0;
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

            return redirect()->route('admin.products.index')
                ->with('success', 'Producto publicado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al crear una prenda: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error inesperado al guardar la prenda.');
        }
    }

    public function show(Prenda $prenda)
    {
        $prenda->load(['comentarios.user', 'tallas']);
        
        $promedio = $prenda->comentarios->avg('calificacion') ?? 0;
        $totalComentarios = $prenda->comentarios->count();

        return view('products.show', compact('prenda', 'promedio', 'totalComentarios'));
    }
}
