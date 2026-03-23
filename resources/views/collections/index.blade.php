@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/collections.css') }}">
@endpush

@section('content')

@include('partials.back-button')

@if($search)
    <section class="search-results-section" style="padding: 40px 6%; background: #f8fafc;">
        <div class="container">
            <h2 style="font-size: 1.8rem; font-weight: 700; color: #1a1a1a; margin-bottom: 10px;">
                Resultados para: <span style="color: #059669;">"{{ $search }}"</span>
            </h2>
            <p style="color: #666; margin-bottom: 30px;">
                Se encontraron {{ $prendas->total() }} productos.
            </p>

            @if($prendas->isEmpty())
                <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                    <div style="font-size: 4rem; color: #e2e8f0; margin-bottom: 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; color: #475569; margin-bottom: 10px;">No se encontraron productos</h3>
                    <p style="color: #94a3b8; max-width: 400px; margin: 0 auto;">
                        Lo sentimos, no pudimos encontrar productos que coincidan con tu búsqueda. Intenta con otros términos.
                    </p>
                    <a href="{{ route('collections') }}" style="display: inline-block; margin-top: 25px; padding: 12px 30px; background: #0b3d2e; color: white; border-radius: 30px; font-weight: 600; text-decoration: none; transition: transform 0.2s ease;">
                        Ver todas las colecciones
                    </a>
                </div>
            @else
                <div class="trending-grid">
                    @foreach($prendas as $product)
                        <div class="trending-card">
                            <a href="{{ route('products.show', $product->id) }}" style="width: 100%;">
                                <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="product-img">
                            </a>
                            <h3>{{ $product->nombre }}</h3>
                            <div class="price-box">
                                <span class="current-price">${{ number_format($product->precio_venta, 2) }}</span>
                                <span class="old-price">${{ number_format($product->precio_venta * 1.25, 2) }}</span>
                            </div>
                            @php
                                $requiresSize = !(in_array(strtolower($product->categoria ?? ''), ['mochilas', 'botellas', 'gorras']) || strtolower($product->tipo ?? '') == 'accesorios');
                            @endphp

                            <form action="{{ route('cart.add') }}" method="POST" class="w-100 {{ $requiresSize ? 'requires-size-form' : '' }}">
                                @csrf
                                <input type="hidden" name="prenda_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn-add-trending">Añadir al carrito</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    {{ $prendas->appends(['search' => $search])->links() }}
                </div>
            @endif
        </div>
    </section>
@endif

<section class="collections-hero" @if($search) style="padding-top: 60px;" @endif>
    <h1>Colecciones</h1>
    <p>Explora nuestras líneas sostenibles diseñadas para moverte con estilo y conciencia.</p>

    <div class="collections-tabs">
        <a href="{{ route('collections.hombre') }}" class="tab">Hombre</a>
        <a href="{{ route('collections.mujer') }}" class="tab">Mujer</a>
        <a href="{{ route('collections.accesorios') }}" class="tab">Accesorios</a>
    </div>
</section>
  
<section class="collections-grid">

    <a href="{{ route('collections.hombre') }}" class="collection-card">
        <div class="overlay"></div>
        <div class="collection-content">
            <h3>Hombre</h3>
            <p>Rendimiento, fuerza y diseño sostenible</p>
        </div>
    </a>

    <a href="{{ route('collections.mujer') }}" class="collection-card mujer">
        <div class="overlay"></div>
        <div class="collection-content">
            <h3>Mujer</h3>
            <p>Estilo, poder y conciencia ecológica</p>
        </div>
    </a>

    <a href="{{ route('collections.accesorios') }}" class="collection-card accesorios">
        <div class="overlay"></div>
        <div class="collection-content">
            <h3>Accesorios</h3>
            <p>Detalles que hacen la diferencia</p>
        </div>
    </a>

</section>

@endsection
