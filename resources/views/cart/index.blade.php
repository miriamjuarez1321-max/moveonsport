@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<section class="cart-section">
    <div class="cart-header">
        <div>
            <h1>Tu Carrito</h1>
            <a href="{{ route('orders.index') }}" class="text-decoration-none small" style="color: var(--ml-blue); font-weight: 600;">
                <i class="bi bi-clock-history me-1"></i> Ver historial de compras
            </a>
        </div>
        <span>{{ $cartItems->count() }} artículo(s)</span>
    </div>

    @if(session('success'))
        <div class="cart-alert">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <div class="empty-cart">
            <h2>Tu carrito está vacío</h2>
            <p>Parece que aún no has añadido nada a tu carrito. Explora nuestras colecciones y encuentra lo que buscas.</p>
            <a href="{{ route('collections') }}" class="btn-primary btn-empty-cart">Explorar Colecciones</a>
        </div>
    @else
        <div class="cart-container">
            <!-- Lista de Productos -->
            <div class="cart-items">
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <img src="{{ asset('storage/' . $item->prenda->imagen) }}" alt="{{ $item->prenda->nombre }}" class="item-image">
                        
                        <div class="item-details">
                            <h3>{{ $item->prenda->nombre }}</h3>
                            @if(strtolower($item->prenda->tipo ?? '') == 'tenis')
                                <p>Número: {{ $item->talla }} | Color: {{ $item->prenda->color }}</p>
                            @elseif(in_array($item->prenda->categoria, ['hombre', 'mujer']))
                                <p>Talla: {{ $item->talla }} | Color: {{ $item->prenda->color }}</p>
                            @endif
                            <div class="item-price">${{ number_format($item->prenda->precio_venta, 2) }}</div>
                        </div>

                        <div class="item-actions">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="quantity-form m-0">
                                @csrf
                                @method('PATCH')
                                <div class="quantity-control">
                                    <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown(); this.form.submit();">-</button>
                                    <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="qty-input" readonly>
                                    <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp(); this.form.submit();">+</button>
                                </div>
                            </form>

                            <div class="item-total">
                                ${{ number_format($item->prenda->precio_venta * $item->cantidad, 2) }}
                            </div>

                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-btn">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Resumen de Compra -->
            <div class="cart-summary">
                <h2>Resumen de Compra</h2>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span>Envío</span>
                    <span>Gratis</span>
                </div>
                <div class="summary-row summary-total">
                    <span>Total</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="checkout-btn text-center text-decoration-none d-block">Proceder al Pago</a>
            </div>
        </div>
    @endif

</section>

@endsection
