@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/mujer.css') }}"> <!-- Styling should follow same conventions -->
    <link rel="stylesheet" href="{{ asset('css/collections.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<section class="collection-hero">
    <h1>COLECCIÓN ACCESORIOS</h1>
    <p>Complementos diseñados para maximizar tu rendimiento deportivo. Construidos para durar.</p>

    <div class="filters">
        <a href="{{ route('collections.accesorios', ['categoria' => 'Todos']) }}" class="{{ !$categoria || $categoria === 'Todos' ? 'active' : '' }}">Todos</a>
        <a href="{{ route('collections.accesorios', ['categoria' => 'Mochilas']) }}" class="{{ $categoria === 'Mochilas' ? 'active' : '' }}">Mochilas</a>
        <a href="{{ route('collections.accesorios', ['categoria' => 'Botellas']) }}" class="{{ $categoria === 'Botellas' ? 'active' : '' }}">Botellas</a>
        <a href="{{ route('collections.accesorios', ['categoria' => 'Gorras']) }}" class="{{ $categoria === 'Gorras' ? 'active' : '' }}">Gorras</a>
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

                <form action="{{ route('cart.add') }}" method="POST" style="margin: 0; padding: 0;">
                    @csrf
                    <input type="hidden" name="prenda_id" value="{{ $prenda->id }}">
                    <button type="submit" class="cart-btn">Añadir al carrito</button>
                </form>
            </div>
        </div>
        @endforeach

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
