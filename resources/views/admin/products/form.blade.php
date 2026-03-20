@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('css/prendas/create.css') }}">
@endpush

@section('content')
<div class="admin-page-bg">
    <div class="container" style="max-width: 800px; padding-top: 40px;">
        <div class="admin-card">
            <div class="admin-header">
                <h1>
                    <i class="bi {{ isset($prenda) ? 'bi-pencil-fill' : 'bi-plus-circle-fill' }} me-2"></i>
                    {{ isset($prenda) ? 'Editar Producto' : 'Publicar nuevo producto' }}
                </h1>
                <p>
                    {{ isset($prenda) ? 'Modifica la información del producto #' . $prenda->id : 'Ingresa la información detallada para que tus clientes encuentren lo que buscan.' }}
                </p>
            </div>

            <form id="prendaForm" action="{{ isset($prenda) ? route('admin.products.update', $prenda->id) : route('prendas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($prenda)
                    @method('PATCH')
                @endisset

                <!-- Sección 1: Información Básica -->
                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-info-circle"></i> Información básica</h3>
                    
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre del producto *</label>
                        <input type="text" id="nombre" name="nombre" class="form-control w-100 @error('nombre') is-invalid @enderror" value="{{ old('nombre', $prenda->nombre ?? '') }}" required placeholder="Ej. Playera Performance Elite">
                        @error('nombre') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label">Descripción detallada *</label>
                        <textarea id="descripcion" name="descripcion" rows="4" class="form-control w-100 @error('descripcion') is-invalid @enderror" required placeholder="Describe materiales, tecnología y beneficios...">{{ old('descripcion', $prenda->descripcion ?? '') }}</textarea>
                        @error('descripcion') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Sección 2: Atributos -->
                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-tags"></i> Atributos y Precio</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="precio_compra" class="form-label">Precio de compra ($) *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">$</span>
                                <input type="number" step="0.01" min="0.01" id="precio_compra" name="precio_compra" class="form-control border-start-0 @error('precio_compra') is-invalid @enderror" value="{{ old('precio_compra', $prenda->precio_compra ?? 0) }}" required placeholder="0.00" oninput="calculateProfit()">
                            </div>
                            @error('precio_compra') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="precio_venta" class="form-label">Precio de venta ($) *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">$</span>
                                <input type="number" step="0.01" min="0.01" id="precio_venta" name="precio_venta" class="form-control border-start-0 @error('precio_venta') is-invalid @enderror" value="{{ old('precio_venta', $prenda->precio_venta ?? 0) }}" required placeholder="0.00" oninput="calculateProfit()">
                            </div>
                            <div id="price-error-message" class="error-message d-none" style="margin-top: 5px;">
                                El precio de venta debe ser mayor al precio de compra.
                            </div>
                            @error('precio_venta') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Ganancia estimada</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">$</span>
                                <input type="text" id="ganancia_display" class="form-control border-start-0 bg-light" readonly value="0.00">
                            </div>
                            <small class="text-muted">Calculado automáticamente: Venta - Compra</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Margen de utilidad (%)</label>
                            <div class="input-group">
                                <input type="text" id="margen_display" class="form-control bg-light" readonly value="0.00">
                                <span class="input-group-text bg-light border-start-0">%</span>
                            </div>
                            <small class="text-muted">Fórmula: (Ganancia / Venta) * 100</small>
                        </div>

                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock {{ isset($prenda) ? 'Actual' : 'Inicial' }} *</label>
                            <input type="number" min="2" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $prenda->stock ?? 0) }}" required placeholder="0">
                            @error('stock') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoría *</label>
                            <select id="categoria" name="categoria" class="form-select form-control @error('categoria') is-invalid @enderror" required onchange="updateSubcategories(this.value)">
                                <option value="" disabled {{ !old('categoria', $prenda->categoria ?? null) ? 'selected' : '' }}>Selecciona una categoría</option>
                                <option value="hombre" {{ old('categoria', $prenda->categoria ?? '') == 'hombre' ? 'selected' : '' }}>Hombre</option>
                                <option value="mujer" {{ old('categoria', $prenda->categoria ?? '') == 'mujer' ? 'selected' : '' }}>Mujer</option>
                                <option value="accesorios" {{ old('categoria', $prenda->categoria ?? '') == 'accesorios' ? 'selected' : '' }}>Accesorios</option>
                            </select>
                            @error('categoria') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Subcategoría (Tipo) *</label>
                            <select id="tipo" name="tipo" class="form-select form-control @error('tipo') is-invalid @enderror" required>
                                <option value="" disabled {{ !old('tipo', $prenda->tipo ?? null) ? 'selected' : '' }}>Primero selecciona una categoría</option>
                            </select>
                            @error('tipo') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6" id="tallas-container">
                            <label class="form-label">Tallas y Stock *</label>
                            <div class="talla-stock-grid">
                                @foreach(['CH', 'M', 'G', 'XG'] as $talla)
                                    @php
                                        $tallaData = isset($prenda) ? $prenda->tallas->where('talla', $talla)->first() : null;
                                        $stockValue = old("stocks.$talla", $tallaData->stock ?? 0);
                                        $checked = old("tallas_selected.$talla") || ($tallaData && $tallaData->stock > 0);
                                    @endphp
                                    <div class="talla-stock-item {{ $checked ? 'selected' : '' }}">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <input type="checkbox" name="tallas_selected[]" value="{{ $talla }}" class="talla-check" id="check_{{ $talla }}" {{ $checked ? 'checked' : '' }}>
                                            <label for="check_{{ $talla }}" class="m-0 fw-bold">{{ $talla }}</label>
                                        </div>
                                        <input type="number" name="stocks[{{ $talla }}]" class="form-control form-control-sm stock-input" min="0" value="{{ $stockValue }}" placeholder="Stock" {{ $checked ? '' : 'disabled' }}>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="talla" name="talla" value="{{ old('talla', $prenda->talla ?? '') }}">
                            <div id="stock-error-message" class="error-message d-none" style="margin-top: 10px;">
                                La suma del stock por tallas no puede ser mayor al stock actual del producto.
                            </div>
                            @error('tallas_selected') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="color" class="form-label">Color principal *</label>
                            <input type="text" id="color" name="color" class="form-control w-100 @error('color') is-invalid @enderror" value="{{ old('color', $prenda->color ?? '') }}" required placeholder="Ej. Azul Marino">
                            @error('color') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección 3: Multimedia -->
                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-image"></i> Multimedia</h3>
                    <label class="form-label">{{ isset($prenda) ? 'Cambiar imagen (opcional)' : 'Imagen principal del producto *' }}</label>
                    
                    <div class="d-flex flex-column align-items-center gap-3">
                        <div class="file-drop-area w-100" onclick="document.getElementById('imagen').click()">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <span id="file-name-display">Haz clic para subir o arrastra la imagen aquí</span>
                            <input type="file" id="imagen" name="imagen" class="d-none" accept="image/*" {{ isset($prenda) ? '' : 'required' }} onchange="previewImage(this)">
                        </div>

                        <!-- Contenedor de Vista Previa -->
                        <div id="image-preview-container" class="{{ isset($prenda) ? '' : 'd-none' }} text-center">
                            <p class="text-muted small mb-2">{{ isset($prenda) ? 'Imagen actual / Nueva selección:' : 'Vista previa:' }}</p>
                            <img id="image-preview" 
                                 src="{{ isset($prenda) ? asset('storage/' . $prenda->imagen) : '#' }}" 
                                 alt="Vista previa" 
                                 style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 10px; border: 2px solid var(--admin-border); padding: 4px; background: #fff;">
                        </div>
                    </div>
                    @error('imagen') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <!-- Botones -->
                <div class="d-flex align-items-center justify-content-between mt-5 pt-4 border-top">
                    @if(isset($prenda))
                        <a href="{{ route('admin.products.index') }}" class="btn-back">
                            <i class="bi bi-arrow-left me-1"></i> Cancelar
                        </a>
                    @else
                        <a id="btn-back-dynamic" href="{{ route('collections.' . ($categoria ?? 'hombre')) }}" class="btn-back">
                            <i class="bi bi-arrow-left me-1"></i> Volver al listado
                        </a>
                    @endif
                    <button type="submit" class="btn-save">
                        {{ isset($prenda) ? 'Guardar cambios' : 'Publicar producto' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const subcategorias = {
        'hombre': ['Playeras', 'Pans y Short', 'Conjuntos', 'Tenis'],
        'mujer': ['Playeras', 'Pans y Short', 'Conjuntos', 'Tenis'],
        'accesorios': ['Mochilas', 'Botellas', 'Gorras']
    };

    function updateSubcategories(categoria, selectedTipo = null) {
        const tipoSelect = document.getElementById('tipo');
        const tallasContainer = document.getElementById('tallas-container');
        const hiddenTallaInput = document.getElementById('talla');
        const tallaChecks = document.querySelectorAll('.talla-check');
        const btnBack = document.getElementById('btn-back-dynamic');

        // Limpiar opciones previas
        tipoSelect.innerHTML = '<option value="" disabled selected>Selecciona una subcategoría</option>';

        // Cargar nuevas opciones
        if (subcategorias[categoria]) {
            subcategorias[categoria].forEach(sub => {
                const option = document.createElement('option');
                option.value = sub;
                option.textContent = sub;
                if (selectedTipo === sub) {
                    option.selected = true;
                }
                tipoSelect.appendChild(option);
            });
        }

        // Actualizar link de volver dinámicamente si no estamos editando
        if (btnBack) {
            const baseUrl = "{{ url('/colecciones') }}";
            btnBack.href = `${baseUrl}/${categoria}`;
        }

        // Manejar tallas para accesorios
        if (categoria === 'accesorios') {
            tallasContainer.classList.add('d-none');
            hiddenTallaInput.value = 'N/A';
            tallaChecks.forEach(cb => {
                cb.checked = false;
                cb.parentElement.classList.remove('selected');
            });
        } else {
            tallasContainer.classList.remove('d-none');
            updateHiddenTallaInput();
        }
    }

    function updateHiddenTallaInput() {
        const selectedTallas = Array.from(document.querySelectorAll('.talla-check:checked'))
                                    .map(cb => cb.value)
                                    .join(', ');
        document.getElementById('talla').value = selectedTallas;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const categoriaSelect = document.getElementById('categoria');
        const stockActualInput = document.getElementById('stock');
        const prendaForm = document.getElementById('prendaForm');
        const stockErrorMessage = document.getElementById('stock-error-message');
        const priceErrorMessage = document.getElementById('price-error-message');
        const compraInput = document.getElementById('precio_compra');
        const ventaInput = document.getElementById('precio_venta');
        
        function validatePrices() {
            const compra = parseFloat(compraInput.value) || 0;
            const venta = parseFloat(ventaInput.value) || 0;

            if (venta <= compra && venta > 0) {
                priceErrorMessage.classList.remove('d-none');
                ventaInput.classList.add('is-invalid');
                return false;
            } else {
                priceErrorMessage.classList.add('d-none');
                ventaInput.classList.remove('is-invalid');
                return true;
            }
        }

        function validateStockSum() {
            const stockActual = parseInt(stockActualInput.value) || 0;
            let sumTallas = 0;
            
            document.querySelectorAll('.talla-check:checked').forEach(cb => {
                const stockInput = cb.closest('.talla-stock-item').querySelector('.stock-input');
                sumTallas += parseInt(stockInput.value) || 0;
            });

            if (sumTallas > stockActual) {
                stockErrorMessage.classList.remove('d-none');
                return false;
            } else {
                stockErrorMessage.classList.add('d-none');
                return true;
            }
        }

        // Validar en el envío del formulario
        prendaForm.addEventListener('submit', function(e) {
            const isStockValid = validateStockSum();
            const arePricesValid = validatePrices();

            if (!isStockValid || !arePricesValid) {
                e.preventDefault();
                
                if (!arePricesValid) {
                    priceErrorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else if (!isStockValid) {
                    stockErrorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });

        // Validar al cambiar precios
        compraInput.addEventListener('input', validatePrices);
        ventaInput.addEventListener('input', validatePrices);

        // Validar al cambiar el stock actual o cualquier stock de talla
        stockActualInput.addEventListener('input', validateStockSum);
        document.querySelectorAll('.stock-input').forEach(input => {
            input.addEventListener('input', validateStockSum);
        });
        
        // Manejar estilo visual de checkboxes de talla y habilitar inputs de stock
        document.querySelectorAll('.talla-check').forEach(cb => {
            cb.addEventListener('change', function() {
                const stockInput = this.closest('.talla-stock-item').querySelector('.stock-input');
                if (this.checked) {
                    this.parentElement.parentElement.classList.add('selected');
                    stockInput.disabled = false;
                    if (stockInput.value == 0) stockInput.value = 1;
                } else {
                    this.parentElement.parentElement.classList.remove('selected');
                    stockInput.disabled = true;
                }
                updateHiddenTallaInput();
                validateStockSum();
            });
        });

        // Inicializar si hay valores previos o existentes
        if (categoriaSelect.value) {
            const oldTipo = "{{ old('tipo', $prenda->tipo ?? '') }}";
            updateSubcategories(categoriaSelect.value, oldTipo);
        }

        const oldTalla = document.getElementById('talla').value;
        if (oldTalla && oldTalla !== 'N/A') {
            const tallasArray = oldTalla.split(', ').map(t => t.trim());
            document.querySelectorAll('.talla-check').forEach(cb => {
                if (tallasArray.includes(cb.value)) {
                    cb.checked = true;
                    cb.parentElement.classList.add('selected');
                }
            });
        }

        calculateProfit();
    });

    function previewImage(input) {
        const display = document.getElementById('file-name-display');
        const previewContainer = document.getElementById('image-preview-container');
        const previewImage = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
                display.innerHTML = '<strong style="color: var(--admin-primary)">' + input.files[0].name + '</strong> seleccionada';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            if (!previewImage.src || previewImage.src.includes('#')) {
                previewContainer.classList.add('d-none');
            }
            display.innerHTML = 'Haz clic para subir o arrastra la imagen aquí';
        }
    }

    function calculateProfit() {
        const compra = parseFloat(document.getElementById('precio_compra').value) || 0;
        const venta = parseFloat(document.getElementById('precio_venta').value) || 0;
        const ganancia = venta - compra;
        
        const displayGanancia = document.getElementById('ganancia_display');
        const displayMargen = document.getElementById('margen_display');
        
        // Calcular Ganancia
        displayGanancia.value = ganancia.toFixed(2);
        
        // Calcular Margen de Utilidad (%)
        let margen = 0;
        if (venta > 0) {
            margen = (ganancia / venta) * 100;
        }
        displayMargen.value = margen.toFixed(2);
        
        // Estilo visual para Ganancia
        if (ganancia < 0) {
            displayGanancia.classList.add('text-danger');
            displayGanancia.classList.remove('text-success');
        } else if (ganancia > 0) {
            displayGanancia.classList.add('text-success');
            displayGanancia.classList.remove('text-danger');
        } else {
            displayGanancia.classList.remove('text-danger', 'text-success');
        }

        // Estilo visual para Margen
        if (margen < 0) {
            displayMargen.classList.add('text-danger');
            displayMargen.classList.remove('text-success');
        } else if (margen > 0) {
            displayMargen.classList.add('text-success');
            displayMargen.classList.remove('text-danger');
        } else {
            displayMargen.classList.remove('text-danger', 'text-success');
        }
    }
</script>
@endsection
