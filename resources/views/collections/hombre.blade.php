@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/hombre.css') }}">
    <link rel="stylesheet" href="{{ asset('css/collections.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<section class="collection-hero">
    <h1>COLECCIÓN HOMBRE</h1>
    <p>Ropa deportiva sostenible diseñada para rendimiento, estilo y conciencia ambiental.</p>

    <div class="filters">
        <a href="{{ route('collections.hombre', ['categoria' => 'Todos']) }}" class="{{ !$categoria || $categoria === 'Todos' ? 'active' : '' }}">Todos</a>
        <a href="{{ route('collections.hombre', ['categoria' => 'Playeras']) }}" class="{{ $categoria === 'Playeras' ? 'active' : '' }}">Playeras</a>
        <a href="{{ route('collections.hombre', ['categoria' => 'Pans y Short']) }}" class="{{ $categoria === 'Pans y Short' ? 'active' : '' }}">Pans y Short</a>
        <a href="{{ route('collections.hombre', ['categoria' => 'Conjuntos']) }}" class="{{ $categoria === 'Conjuntos' ? 'active' : '' }}">Conjuntos</a>
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
                    @foreach(explode(',', $prenda->talla) as $talla)
                        <span>{{ trim($talla) }}</span>
                    @endforeach
                </div>

                <form action="{{ route('cart.add') }}" method="POST" style="margin: 0; padding: 0;">
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
