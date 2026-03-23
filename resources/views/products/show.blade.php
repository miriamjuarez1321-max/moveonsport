@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('css/collections.css') }}">
<link rel="stylesheet" href="{{ asset('css/products/show.css') }}">
@endpush

<style>
    .size-btn.out-of-stock {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: #f8f9fa;
        border-color: #ddd;
        position: relative;
    }
    .size-btn.out-of-stock::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background: #ff4d4d;
        transform: rotate(-45deg);
    }
</style>

@section('content')
<!-- Breadcrumbs Row -->
<div class="breadcrumb-row">
    <div class="container d-flex align-items-center">
        @include('partials.back-button', ['without_container' => true])
        
        <div class="breadcrumb-nav-links">
            <a href="{{ route('collections.hombre') }}" class="btn-cat-nav {{ $prenda->categoria == 'hombre' ? 'active' : '' }}">
                Hombre
            </a>
            <a href="{{ route('collections.mujer') }}" class="btn-cat-nav {{ $prenda->categoria == 'mujer' ? 'active' : '' }}">
                Mujer
            </a>
            <a href="{{ route('collections.accesorios') }}" class="btn-cat-nav {{ $prenda->categoria == 'accesorios' ? 'active' : '' }}">
                Accesorios
            </a>
        </div>
    </div>
</div>

<div class="product-page">
    <div class="container">
        <!-- Main Product Card -->
        <div class="product-main-card">
            <div class="row g-0 row-grid-main">
                <!-- Col 1: Main Image -->
                <div class="col-lg-6 col-md-12 main-img-col">
                    <div class="main-img-container">
                        <img id="mainProductImg" src="{{ asset('storage/' . $prenda->imagen) }}" alt="{{ $prenda->nombre }}">
                    </div>
                </div>

                <!-- Col 3: Product Info -->
                <div class="col-lg-3 col-md-12 info-section">
                    <div class="product-status" style="margin-top: 10px;">Nuevo</div>
                    <h1 class="product-name-title">{{ $prenda->nombre }}</h1>
                    
                    <div class="rating-line">
                        <span>{{ number_format($promedio, 1) }}</span>
                        <div class="stars-box">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= round($promedio) ? '-fill' : '' }}"></i>
                            @endfor
                        </div>
                        <span style="color: var(--ml-text-gray)">({{ $totalComentarios }})</span>
                    </div>

                    <div class="price-value">${{ number_format($prenda->precio_venta, 2) }}</div>
                    <span class="shipping-promo">Envío gratis a todo el país</span>

                    <!-- Color selector -->
                    <div class="variant-box">
                        <span class="variant-title">Color: <strong>{{ $prenda->color }}</strong></span>
                        <div class="color-select-box">
                            <img src="{{ asset('storage/' . $prenda->imagen) }}" alt="color">
                        </div>
                    </div>

                    <!-- Size selector -->
                    @if($prenda->categoria != 'accesorios')
                    <div class="variant-box">
                        <span class="variant-title">{{ strtolower($prenda->tipo ?? '') == 'tenis' ? 'Número' : 'Talla' }}: <strong id="selectedSizeText">Elige</strong></span>
                        <div class="size-options">
                            @if(strtolower($prenda->tipo ?? '') == 'tenis')
                                @foreach($prenda->variantes->where('stock', '>', 0) as $variante)
                                    <div class="size-btn" 
                                         onclick="selectSize('{{ $variante->valor }}', this, {{ $variante->stock }})">
                                        {{ $variante->valor }}
                                    </div>
                                @endforeach
                            @else
                                @foreach($prenda->tallas as $tallaRel)
                                    <div class="size-btn {{ $tallaRel->stock <= 0 ? 'out-of-stock' : '' }}" 
                                         onclick="{{ $tallaRel->stock > 0 ? "selectSize('$tallaRel->talla', this, $tallaRel->stock)" : '' }}"
                                         data-stock="{{ $tallaRel->stock }}">
                                        {{ $tallaRel->talla }}
                                        @if($tallaRel->stock <= 0)
                                            <small class="d-block" style="font-size: 0.6rem; color: #ff4d4d;">Agotado</small>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a href="#" class="size-guide-btn" data-bs-toggle="modal" data-bs-target="#guideModal">
                            <i class="bi bi-rulers"></i> Guía de tallas
                        </a>
                    </div>
                    @endif

                    <!-- Key points -->
                    <div class="key-points-section">
                        <h4 class="key-points-title">Lo que tienes que saber de este producto</h4>
                        <ul class="key-points-list">
                            @if($prenda->categoria == 'accesorios')
                                <li>Diseño versátil y funcional.</li>
                                <li>Materiales de alta durabilidad.</li>
                                <li>Ideal para complementar tu equipo deportivo.</li>
                                <li>Fácil mantenimiento y limpieza.</li>
                            @else
                                <li>Diseño de alto rendimiento: {{ $prenda->categoria }}.</li>
                                <li>Material transpirable Dry-Fit.</li>
                                <li>Ideal para entrenamiento intensivo.</li>
                                <li>Tecnología de costura plana para evitar roces.</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Col 4: Buy Box -->
                <div class="col-lg-3 col-md-12 buy-box-col">
                    <div class="buy-box-card">
                        @if($prenda->stock > 0)
                            <span class="shipping-badge">Llega gratis el jueves</span>
                            <span class="shipping-subtext">por ser tu primera compra</span>
                            
                            <span class="return-badge">Devolución gratis</span>
                            <span class="return-subtext">Tienes 30 días desde que lo recibes.</span>

                            <span class="stock-available" style="margin-bottom: 4px;">
                                @if($prenda->stock > 10)
                                    Stock disponible
                                @elseif($prenda->stock <= 5)
                                    <span class="text-danger">¡Pocas unidades disponibles!</span>
                                @else
                                    Stock disponible
                                @endif
                            </span>
                            
                            <div class="qty-selector-container">
                                <div class="qty-controls">
                                    <button type="button" class="qty-btn" id="decreaseQty" aria-label="Disminuir cantidad">
                                        <i class="bi bi-dash" style="font-weight: bold;"></i>
                                    </button>
                                    <input type="number" id="buyQty" value="1" min="1" max="{{ $prenda->stock }}" readonly>
                                    <button type="button" class="qty-btn" id="increaseQty" aria-label="Aumentar cantidad">
                                        <i class="bi bi-plus" style="font-weight: bold;"></i>
                                    </button>
                                </div>
                                <span class="qty-available-hint" style="display: none;">({{ $prenda->stock }} disponibles)</span>
                            </div>

                            <form action="{{ route('cart.add') }}" method="POST" id="buyNowForm">
                                @csrf
                                <input type="hidden" name="prenda_id" value="{{ $prenda->id }}">
                                <input type="hidden" name="quantity" id="buyNowQty" value="1">
                                <input type="hidden" name="talla" id="buyNowSizeInput" value="">
                                <input type="hidden" name="buy_now" value="1">
                                <button type="submit" class="btn-buy-now-blue">Comprar ahora</button>
                            </form>
                            
                            <form action="{{ route('cart.add') }}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="prenda_id" value="{{ $prenda->id }}">
                                <input type="hidden" name="quantity" id="finalQty" value="1">
                                <input type="hidden" name="talla" id="selectedSizeInput" value="">
                                <button type="submit" class="btn-add-cart-light">Agregar al carrito</button>
                            </form>
                        @else
                            <div class="text-center py-4">
                                <i class="bi bi-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                                <h4 class="fw-bold mt-3">Producto agotado</h4>
                                <p class="text-muted small">Este producto no está disponible por el momento. ¡Vuelve pronto!</p>
                                <button class="btn btn-secondary w-100 mt-3" disabled>Añadir al carrito</button>
                            </div>
                        @endif

                        <div class="official-store-info">
                            <div class="store-logo">
                                <img src="{{ asset('images/logo/logo.png') }}" alt="MoveOn Logo">
                            </div>
                            <div>
                                <span class="store-name-text">Tienda oficial MoveOn Sport <i class="bi bi-patch-check-fill" style="color: var(--ml-blue); font-size: 0.8rem;"></i></span>
                                <div style="font-size: 0.75rem; color: var(--ml-text-gray);">+100mil ventas</div>
                            </div>
                        </div>

                        <div style="margin-top: 20px; font-size: 0.8rem; color: var(--ml-text-gray);">
                            <div class="mb-2"><i class="bi bi-shield-check" style="color: var(--ml-blue);"></i> <strong>Compra Protegida.</strong> Recibe el producto que esperabas o te devolvemos tu dinero.</div>
                            <div><i class="bi bi-award" style="color: var(--ml-blue);"></i> <strong>Garantía.</strong> 12 meses de garantía de fábrica.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description and Specs -->
        <div class="bottom-specs-card">
            <h2 class="bottom-title">Descripción</h2>
            <div style="font-size: 1.1rem; color: var(--ml-text-gray); line-height: 1.6; margin-bottom: 40px; white-space: pre-line;">
                {{ $prenda->descripcion }}
            </div>

            <h2 class="bottom-title">Especificaciones del producto</h2>
            <table class="specs-table-ml">
                <tr><th>Marca</th><td>MoveOn Sport</td></tr>
                <tr><th>Modelo</th><td>Performance Elite 2026</td></tr>
                <tr><th>Material</th><td>{{ $prenda->material_formateado }}</td></tr>
                @if($prenda->categoria == 'accesorios')
                    <tr><th>Tipo</th><td>Accesorio Deportivo</td></tr>
                    <tr><th>Uso</th><td>Entrenamiento / Casual</td></tr>
                @else
                    <tr><th>Tipo de prenda</th><td>{{ ucfirst($prenda->tipo ?? $prenda->categoria) }} Deportivo</td></tr>
                    <tr><th>Género</th><td>{{ ucfirst($prenda->categoria) }}</td></tr>
                    <tr><th>Usos recomendados</th><td>Running, Crossfit, Gym, Outdoor</td></tr>
                @endif
            </table>
        </div>

        <!-- Opinions and Comments Section -->
        <div class="bottom-specs-card mt-4" id="opiniones">
            <h2 class="bottom-title">Opiniones sobre el producto</h2>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span style="font-size: 3rem; font-weight: 700; color: #111;">{{ number_format($promedio, 1) }}</span>
                        <div>
                            <div class="stars-box" style="font-size: 1.2rem;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $i <= round($promedio) ? '-fill' : '' }}"></i>
                                @endfor
                            </div>
                            <div class="small text-muted">{{ $totalComentarios }} opiniones</div>
                        </div>
                    </div>

                    @auth
                        @php
                            $haComprado = \App\Models\Order::where('user_id', auth()->id())
                                ->where('estado_pago', 'pagado')
                                ->whereHas('items', function ($query) use ($prenda) {
                                    $query->where('prenda_id', $prenda->id);
                                })->exists();
                            
                            $yaComento = \App\Models\Comentario::where('user_id', auth()->id())
                                ->where('prenda_id', $prenda->id)
                                ->exists();
                        @endphp

                        @if($haComprado && !$yaComento)
                            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #f8fafc;">
                                <h5 class="fw-bold mb-3">Deja tu opinión</h5>
                                <form action="{{ route('comentarios.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="prenda_id" value="{{ $prenda->id }}">
                                    
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Calificación</label>
                                        <select name="calificacion" class="form-select rounded-3" required>
                                            <option value="5">5 estrellas (Excelente)</option>
                                            <option value="4">4 estrellas (Muy bueno)</option>
                                            <option value="3">3 estrellas (Bueno)</option>
                                            <option value="2">2 estrellas (Regular)</option>
                                            <option value="1">1 estrella (Malo)</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Tu comentario</label>
                                        <textarea name="comentario" class="form-control rounded-3" rows="3" placeholder="Cuéntanos qué te pareció el producto..." required minlength="10"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold py-2">
                                        Enviar comentario
                                    </button>
                                </form>
                            </div>
                        @elseif(!$haComprado)
                            <div class="alert alert-light border rounded-4 small mb-4">
                                <i class="bi bi-info-circle me-2"></i>
                                Debes comprar este producto para poder comentar.
                            </div>
                        @elseif($yaComento)
                            <div class="alert alert-success border-0 rounded-4 small mb-4" style="background: #d1fae5; color: #065f46;">
                                <i class="bi bi-check-circle me-2"></i>
                                Ya has compartido tu opinión sobre este producto.
                            </div>
                        @endif
                    @else
                        <div class="alert alert-light border rounded-4 small mb-4">
                            <i class="bi bi-person me-2"></i>
                            <a href="{{ route('login') }}" class="fw-bold text-dark">Inicia sesión</a> para dejar una opinión.
                        </div>
                    @endauth
                </div>

                <div class="col-md-8">
                    <div class="comments-list">
                        @forelse($prenda->comentarios->sortByDesc('created_at') as $comentario)
                            <div class="comment-item border-bottom py-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <div class="stars-box mb-1" style="font-size: 0.85rem;">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-star{{ $i <= $comentario->calificacion ? '-fill' : '' }}"></i>
                                            @endfor
                                        </div>
                                        <div class="fw-bold text-dark">{{ $comentario->user->name }}</div>
                                    </div>
                                    <div class="small text-muted">
                                        {{ $comentario->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                <p class="mb-0 text-dark" style="line-height: 1.5; font-size: 0.95rem;">
                                    {{ $comentario->comentario }}
                                </p>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="bi bi-chat-dots text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                                <p class="mt-3 text-muted">Este producto aún no tiene opiniones.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Guía de Tallas -->
<div class="modal fade" id="guideModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 4px;">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Guía de tallas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr><th>Talla</th><th>Pecho</th><th>Cintura</th><th>Cadera</th></tr>
                    </thead>
                    <tbody>
                        <tr><td><strong>CH</strong></td><td>88-94 cm</td><td>70-76 cm</td><td>90-96 cm</td></tr>
                        <tr><td><strong>M</strong></td><td>95-101 cm</td><td>77-83 cm</td><td>97-103 cm</td></tr>
                        <tr><td><strong>G</strong></td><td>102-108 cm</td><td>84-90 cm</td><td>104-110 cm</td></tr>
                        <tr><td><strong>XG</strong></td><td>109-115 cm</td><td>91-97 cm</td><td>111-117 cm</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let currentMaxStock = {{ $prenda->stock }};

    function selectSize(size, el, stock) {
        // Update hidden inputs and text
        document.getElementById('selectedSizeInput').value = size;
        document.getElementById('buyNowSizeInput').value = size;
        document.getElementById('selectedSizeText').innerText = size;
        
        // Update max stock based on selected size
        currentMaxStock = stock;
        buyQtyInput.setAttribute('max', stock);
        
        // Reset quantity if it exceeds new max
        if (parseInt(buyQtyInput.value) > stock) {
            buyQtyInput.value = stock;
            finalQtyInput.value = stock;
            buyNowQtyInput.value = stock;
        }

        // Update active class
        document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
        el.classList.add('active');
    }

    // Control de cantidad con botones +/-
    const buyQtyInput = document.getElementById('buyQty');
    const finalQtyInput = document.getElementById('finalQty');
    const buyNowQtyInput = document.getElementById('buyNowQty');
    const decreaseBtn = document.getElementById('decreaseQty');
    const increaseBtn = document.getElementById('increaseQty');

    if (decreaseBtn && increaseBtn && buyQtyInput) {
        decreaseBtn.addEventListener('click', function() {
            let currentQty = parseInt(buyQtyInput.value);
            if (currentQty > 1) {
                buyQtyInput.value = currentQty - 1;
                finalQtyInput.value = buyQtyInput.value;
                buyNowQtyInput.value = buyQtyInput.value;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentQty = parseInt(buyQtyInput.value);
            let max = parseInt(buyQtyInput.getAttribute('max')) || currentMaxStock;
            if (currentQty < max) {
                buyQtyInput.value = currentQty + 1;
                finalQtyInput.value = buyQtyInput.value;
                buyNowQtyInput.value = buyQtyInput.value;
            }
        });
    }

    // Validation before adding to cart or buying now
    @if($prenda->categoria != 'accesorios')
    const validateForm = function(e) {
        const selectedSize = document.getElementById('selectedSizeInput').value;
        if (!selectedSize) {
            e.preventDefault();
            alert('Por favor, selecciona una talla antes de continuar.');
        }
    };
    
    document.getElementById('addToCartForm')?.addEventListener('submit', validateForm);
    document.getElementById('buyNowForm')?.addEventListener('submit', validateForm);
    @endif
</script>
@endsection
