@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('css/prendas/create.css') }}">
@endpush

@section('content')
<div class="admin-page-bg">
    <div class="container" style="max-width: 800px;">
        <div class="admin-card">
            <div class="admin-header">
                <h1><i class="bi bi-plus-circle-fill me-2"></i>Publicar nuevo producto</h1>
                <p>Ingresa la información detallada para que tus clientes encuentren lo que buscan.</p>
            </div>

            <form id="prendaForm" action="{{ route('prendas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Sección 1: Información Básica -->
                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-info-circle"></i> Información básica</h3>
                    
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre del producto *</label>
                        <input type="text" id="nombre" name="nombre" class="form-control w-100 @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required placeholder="Ej. Playera Performance Elite">
                        @error('nombre') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label">Descripción detallada *</label>
                        <textarea id="descripcion" name="descripcion" rows="4" class="form-control w-100 @error('descripcion') is-invalid @enderror" required placeholder="Describe materiales, tecnología y beneficios...">{{ old('descripcion') }}</textarea>
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
                                <input type="number" step="0.01" min="0" id="precio_compra" name="precio_compra" class="form-control border-start-0 @error('precio_compra') is-invalid @enderror" value="{{ old('precio_compra', 0) }}" required placeholder="0.00" oninput="calculateProfit()">
                            </div>
                            @error('precio_compra') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="precio_venta" class="form-label">Precio de venta ($) *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">$</span>
                                <input type="number" step="0.01" min="0" id="precio_venta" name="precio_venta" class="form-control border-start-0 @error('precio_venta') is-invalid @enderror" value="{{ old('precio_venta', 0) }}" required placeholder="0.00" oninput="calculateProfit()">
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
                            <label for="stock" class="form-label">Stock Inicial *</label>
                            <input type="number" min="0" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', 0) }}" required placeholder="0">
                            @error('stock') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoría *</label>
                            <select id="categoria" name="categoria" class="form-select form-control @error('categoria') is-invalid @enderror" required onchange="updateSubcategories(this.value)">
                                <option value="" disabled {{ !old('categoria') ? 'selected' : '' }}>Selecciona una categoría</option>
                                <option value="hombre" {{ old('categoria') == 'hombre' ? 'selected' : '' }}>Hombre</option>
                                <option value="mujer" {{ old('categoria') == 'mujer' ? 'selected' : '' }}>Mujer</option>
                                <option value="accesorios" {{ old('categoria') == 'accesorios' ? 'selected' : '' }}>Accesorios</option>
                            </select>
                            @error('categoria') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Subcategoría (Tipo) *</label>
                            <select id="tipo" name="tipo" class="form-select form-control @error('tipo') is-invalid @enderror" required>
                                <option value="" disabled selected>Primero selecciona una categoría</option>
                            </select>
                            @error('tipo') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6" id="tallas-container">
                            <label class="form-label">Tallas disponibles *</label>
                            <div class="talla-checkbox-group">
                                @foreach(['CH', 'M', 'G', 'XG'] as $talla)
                                    <label class="talla-item">
                                        <input type="checkbox" class="talla-check" value="{{ $talla }}">
                                        <span>{{ $talla }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <input type="hidden" id="talla" name="talla" value="{{ old('talla') }}">
                            @error('talla') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <!-- SECCIÓN TENIS: Variantes Dinámicas -->
                        <div class="col-12 d-none" id="variantes-tenis-container">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label mb-0">Números y Stock (Calzado) *</label>
                                <button type="button" class="btn btn-sm btn-outline-success" onclick="addVarianteRow()">
                                    <i class="bi bi-plus-circle me-1"></i> Agregar número
                                </button>
                            </div>
                            
                            <div id="variantes-list" class="row g-2">
                                <!-- Las filas de variantes se insertarán aquí dinámicamente -->
                            </div>
                            <div id="variante-stock-error-message" class="error-message d-none" style="margin-top: 10px;">
                                La suma de stock por número excede el stock total disponible.
                            </div>
                            <p class="text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Ingresa números enteros o con decimales (ej. 24, 24.5).</p>
                        </div>

                        <div class="col-md-6">
                            <label for="color" class="form-label">Color principal *</label>
                            <input type="text" id="color" name="color" class="form-control w-100 @error('color') is-invalid @enderror" value="{{ old('color') }}" required placeholder="Ej. Azul Marino">
                            @error('color') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección 3: Multimedia -->
                <div class="mb-5">
                    <h3 class="form-section-title"><i class="bi bi-image"></i> Multimedia</h3>
                    <label class="form-label">Imagen principal del producto *</label>
                    <div class="file-drop-area" onclick="document.getElementById('imagen').click()">
                        <i class="bi bi-cloud-arrow-up"></i>
                        <span id="file-name-display">Haz clic para subir o arrastra la imagen aquí</span>
                        <input type="file" id="imagen" name="imagen" class="d-none" accept="image/*" required onchange="updateFileName(this)">
                    </div>
                    @error('imagen') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <!-- Botones -->
                <div class="d-flex align-items-center justify-content-between mt-5 pt-4 border-top">
                    <a href="{{ route('admin.products.index') }}" class="btn-back">
                        <i class="bi bi-arrow-left me-1"></i> Volver a gestión de productos
                    </a>
                    <button type="submit" class="btn-save">Publicar producto</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const subcategorias = {
        'hombre': ['Playeras', 'Pans y Short', 'Conjuntos', 'Tenis', 'Sudaderas'],
        'mujer': ['Playeras', 'Pans y Short', 'Conjuntos', 'Tenis', 'Sudaderas'],
        'accesorios': ['Mochilas', 'Botellas', 'Gorras']
    };

    function updateSubcategories(categoria) {
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
                tipoSelect.appendChild(option);
            });
        }

        // El botón de retroceso ahora es estático, siempre va a gestión de productos

        // Manejar tallas para accesorios y detectar Tenis
        const variTenisContainer = document.getElementById('variantes-tenis-container');
        const isTenis = (tipoSelect.value || '').toLowerCase() === 'tenis';

        if (categoria === 'accesorios') {
            tallasContainer.classList.add('d-none');
            variTenisContainer.classList.add('d-none');
            hiddenTallaInput.value = 'N/A';
        } else if (isTenis) {
            tallasContainer.classList.add('d-none');
            variTenisContainer.classList.remove('d-none');
            // Si no hay filas, agregar una inicial
            if (document.querySelectorAll('.variante-row').length === 0) {
                addVarianteRow();
            }
        } else {
            tallasContainer.classList.remove('d-none');
            variTenisContainer.classList.add('d-none');
            updateHiddenTallaInput();
        }
    }

    function addVarianteRow() {
        const list = document.getElementById('variantes-list');
        const col = document.createElement('div');
        col.className = 'col-md-4 variante-row';
        col.innerHTML = `
            <div class="p-3 border rounded bg-light position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2" style="font-size: 0.7rem;" onclick="removeVarianteRow(this)"></button>
                <div class="mb-2">
                    <label class="small text-muted">Número</label>
                    <input type="text" name="variantes_numero[]" class="form-control form-control-sm" required placeholder="ej: 23.5">
                </div>
                <div>
                    <label class="small text-muted">Stock</label>
                    <input type="number" name="variantes_stock[]" class="form-control form-control-sm variante-stock-input" required min="1" value="1" oninput="validateStockSum()">
                </div>
            </div>
        `;
        list.appendChild(col);
        validateStockSum();
    }

    function removeVarianteRow(btn) {
        btn.closest('.variante-row').remove();
        validateStockSum();
    }

    function updateHiddenTallaInput() {
        const selectedTallas = Array.from(document.querySelectorAll('.talla-check:checked'))
                                    .map(cb => cb.value)
                                    .join(', ');
        const hiddenInput = document.getElementById('talla');
        if (hiddenInput) hiddenInput.value = selectedTallas;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const categoriaSelect = document.getElementById('categoria');
        
        // Manejar estilo visual de checkboxes de talla
        document.querySelectorAll('.talla-check').forEach(cb => {
            cb.addEventListener('change', function() {
                if (this.checked) {
                    this.parentElement.classList.add('selected');
                } else {
                    this.parentElement.classList.remove('selected');
                }
                updateHiddenTallaInput();
                validateStockSum();
            });
        });

        function validateStockSum() {
            const stockActualInput = document.getElementById('stock');
            const stockActual = parseInt(stockActualInput.value) || 0;
            const tipoSelect = document.getElementById('tipo');
            const isTenis = (tipoSelect.value || '').toLowerCase() === 'tenis';
            const stockErrorMessage = document.getElementById('stock-error-message') || { classList: { add: () => {}, remove: () => {} } }; // Fallback
            const variStockErrorMessage = document.getElementById('variante-stock-error-message');
            
            let sumTotal = 0;
            
            if (isTenis) {
                document.querySelectorAll('.variante-stock-input').forEach(input => {
                    sumTotal += parseInt(input.value) || 0;
                });

                if (sumTotal > stockActual) {
                    variStockErrorMessage.classList.remove('d-none');
                    return false;
                } else {
                    variStockErrorMessage.classList.add('d-none');
                    return true;
                }
            } else {
                document.querySelectorAll('.talla-check:checked').forEach(cb => {
                    // En create.blade.php no hay input de stock por talla individual para ropa (parece ser stock global dividido?)
                    // Re-leyendo el archivo: el stock de ropa se maneja via checkboxes sin input individual en esta vista específica?
                    // Ah, en create.blade.php (Ropa) solo seleccionan tallas. El stock es global.
                    // Pero la regla dice que la suma no exceda el total. 
                    // Si no hay inputs individuales para ropa en esta vista, la validación de suma siempre pasa o no aplica.
                    // Sin embargo para SHOES sí hay inputs individuales.
                });
                return true;
            }
        }

        const prendaForm = document.getElementById('prendaForm');
        const stockActualInput = document.getElementById('stock');
        
        stockActualInput.addEventListener('input', validateStockSum);

        prendaForm.addEventListener('submit', function(e) {
            if (!validateStockSum()) {
                e.preventDefault();
                document.getElementById('variante-stock-error-message').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });

        // Inicializar si hay valores previos
        if (categoriaSelect.value) {
            updateSubcategories(categoriaSelect.value);
            
            // Si hay un valor previo de tipo (ej. después de error de validación), seleccionarlo
            const oldTipo = "{{ old('tipo') }}";
            if (oldTipo) {
                const tipoSelect = document.getElementById('tipo');
                tipoSelect.value = oldTipo;
            }
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
    });

    function updateFileName(input) {
        const display = document.getElementById('file-name-display');
        if (input.files && input.files[0]) {
            display.innerHTML = '<strong style="color: var(--admin-primary)">' + input.files[0].name + '</strong> seleccionada';
        } else {
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

    // Inicializar ganancia al cargar si hay valores
    document.addEventListener('DOMContentLoaded', function() {
        calculateProfit();
    });
</script>
@endsection
