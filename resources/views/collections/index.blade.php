@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/collections.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<section class="collections-hero">
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
