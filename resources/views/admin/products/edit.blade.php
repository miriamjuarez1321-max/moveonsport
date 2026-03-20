@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/prendas/create.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')
<div class="admin-page-bg">
    <div class="container" style="max-width: 800px;">
        <div class="mb-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-link text-decoration-none text-dark p-0">
                <i class="bi bi-arrow-left me-1"></i> Volver al panel
            </a>
        </div>

        <div class="admin-card">
            <div class="admin-header">
                <h1><i class="bi bi-pencil-fill me-2"></i>Editar Producto</h1>
                <p>Modifica la información del producto #{{ $prenda->id }}</p>
            </div>

            <form action="{{ route('admin.products.update', $prenda->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-info-circle"></i> Información básica</h3>
                    
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre del producto *</label>
                        <input type="text" id="nombre" name="nombre" class="form-control w-100 @error('nombre') is-invalid @enderror" value="{{ old('nombre', $prenda->nombre) }}" required>
                        @error('nombre') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label">Descripción detallada *</label>
                        <textarea id="descripcion" name="descripcion" rows="4" class="form-control w-100 @error('descripcion') is-invalid @enderror" required>{{ old('descripcion', $prenda->descripcion) }}</textarea>
                        @error('descripcion') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-tags"></i> Atributos y Stock</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="precio_venta" class="form-label">Precio de venta ($) *</label>
                            <input type="number" step="0.01" min="0" id="precio_venta" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{ old('precio_venta', $prenda->precio_venta) }}" required>
                            @error('precio_venta') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock Actual *</label>
                            <input type="number" min="0" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $prenda->stock) }}" required>
                            @error('stock') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoría *</label>
                            <select id="categoria" name="categoria" class="form-select form-control @error('categoria') is-invalid @enderror" required>
                                <option value="hombre" {{ old('categoria', $prenda->categoria) == 'hombre' ? 'selected' : '' }}>Hombre</option>
                                <option value="mujer" {{ old('categoria', $prenda->categoria) == 'mujer' ? 'selected' : '' }}>Mujer</option>
                                <option value="accesorios" {{ old('categoria', $prenda->categoria) == 'accesorios' ? 'selected' : '' }}>Accesorios</option>
                            </select>
                            @error('categoria') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-image"></i> Multimedia</h3>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('storage/' . $prenda->imagen) }}" alt="Actual" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
                        <span class="text-muted small">Imagen actual</span>
                    </div>
                    <label class="form-label">Cambiar imagen (opcional)</label>
                    <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
                    @error('imagen') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="d-flex align-items-center justify-content-end mt-5 pt-4 border-top">
                    <button type="submit" class="btn-save">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
