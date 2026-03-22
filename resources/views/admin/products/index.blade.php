@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="admin-title mb-0">
                    <i class="bi bi-box-seam-fill"></i> Gestión de Productos
                </h1>
                <a href="{{ route('prendas.create') }}" class="btn btn-dark rounded-pill px-4">
                    <i class="bi bi-plus-lg me-1"></i> Nuevo Producto
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="admin-table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="fw-bold">#{{ $product->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="admin-product-img">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $product->nombre }}</div>
                                    <div class="text-muted small">{{ Str::limit($product->descripcion, 40) }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border text-capitalize">
                                        {{ $product->categoria }}
                                    </span>
                                </td>
                                <td class="fw-bold text-dark">${{ number_format($product->precio_venta, 2) }}</td>
                                <td>
                                    <span class="fw-bold {{ $product->stock <= 5 ? 'text-danger' : 'text-success' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td>
                                    <div class="admin-actions">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn-admin-action btn-view" title="Ver en Tienda">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                        
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-admin-action btn-edit" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este producto permanentemente?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-admin-action btn-delete" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="admin-pagination-wrapper">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
