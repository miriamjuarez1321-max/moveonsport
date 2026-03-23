@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/mujer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/collections.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<section class="collection-hero">
    <h1>COLECCIÓN MUJER</h1>
    <p>Diseño, rendimiento y sostenibilidad en perfecta armonía. Moda deportiva que empodera.</p>

    <div class="filters">
        <a href="{{ route('collections.mujer', ['categoria' => 'Todos']) }}" class="{{ !$categoria || $categoria === 'Todos' ? 'active' : '' }}">Todos</a>
        <a href="{{ route('collections.mujer', ['categoria' => 'Playeras']) }}" class="{{ $categoria === 'Playeras' ? 'active' : '' }}">Playeras</a>
        <a href="{{ route('collections.mujer', ['categoria' => 'Pans y Short']) }}" class="{{ $categoria === 'Pans y Short' ? 'active' : '' }}">Pans y Short</a>
        <a href="{{ route('collections.mujer', ['categoria' => 'Conjuntos']) }}" class="{{ $categoria === 'Conjuntos' ? 'active' : '' }}">Conjuntos</a>
        <a href="{{ route('collections.mujer', ['categoria' => 'Tenis']) }}" class="{{ $categoria === 'Tenis' ? 'active' : '' }}">Tenis</a>
        <a href="{{ route('collections.mujer', ['categoria' => 'Sudaderas']) }}" class="{{ $categoria === 'Sudaderas' ? 'active' : '' }}">Sudaderas</a>
    </div>
</section>

<section class="products-section">

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <div class="products-grid">

        @foreach($prendas as $prenda)
        <div class="product-card">
            @if(in_array(strtolower($prenda->nombre), ['eco', 'reciclado', 'orgánico', 'sostenible']))
                <span class="eco-badge">🌿 Eco-Friendly</span>
            @endif
            
            <div class="product-image-container">
                <img src="{{ asset('storage/' . $prenda->imagen) }}" alt="{{ $prenda->nombre }}">
                <div class="product-overlay">
                    <a href="{{ route('products.show', $prenda->id) }}" class="btn-details">Ver detalles</a>
                </div>
            </div>

            <div class="card-body">
                <small>{{ strtoupper($prenda->categoria) }}</small>
                <h3>{{ $prenda->nombre }}</h3>
                <p>{{ $prenda->descripcion }}</p>

                <div class="price">${{ number_format($prenda->precio_venta, 2) }}</div>

                <div class="sizes">
                    @if(strtolower($prenda->tipo ?? '') == 'tenis')
                        @foreach($prenda->variantes->where('stock', '>', 0) as $variante)
                            <span>{{ $variante->valor }}</span>
                        @endforeach
                    @else
                        @foreach(explode(',', $prenda->talla) as $talla)
                            <span>{{ trim($talla) }}</span>
                        @endforeach
                    @endif
                </div>

                @php
                    $requiresSize = (strtolower($prenda->tipo ?? '') == 'tenis' || in_array(strtolower($prenda->categoria ?? ''), ['hombre', 'mujer', 'unisex']));
                    if(isset($prenda->categoria) && in_array(strtolower($prenda->categoria), ['mochilas', 'botellas', 'gorras'])) $requiresSize = false;
                @endphp

                <form action="{{ route('cart.add') }}" method="POST" style="margin: 0; padding: 0;" class="{{ $requiresSize ? 'requires-size-form' : '' }}">
                    @csrf
                    <input type="hidden" name="prenda_id" value="{{ $prenda->id }}">
                    <button type="submit" class="cart-btn">Añadir al carrito</button>
                </form>

            </div>
        </div>
        @endforeach

        @if($prendas->isEmpty())
            <div style="text-align: center; padding: 60px 20px; width: 100%;">
                <p style="color: #777; font-size: 18px;">No hay productos en esta colección todavía.</p>
            </div>
        @endif

    </div>

</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addButtons = document.querySelectorAll('.cart-btn');
    
    addButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const formData = new FormData(form);
            const originalText = this.innerHTML;
            
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                    return;
                }
                return response.json();
            })
            .then(data => {
                if (data && data.success) {
                    if (typeof showToast === 'function') {
                        showToast(data.message);
                    }
                    // Actualizar contador del carrito
                    const cartBadge = document.querySelector('.cart-count-badge');
                    if (cartBadge && data.cart_count !== undefined) {
                        cartBadge.textContent = data.cart_count;
                        cartBadge.classList.remove('d-none');
                    }
                }
            })
            .catch(error => console.error('Error:', error))
            .finally(() => {
                this.disabled = false;
                this.innerHTML = originalText;
            });
        });
    });
});
</script>
@endpush
