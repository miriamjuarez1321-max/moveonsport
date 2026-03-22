@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center text-center py-5 my-5" style="min-height: 50vh;">
    <h1 class="display-1 fw-bold text-warning" style="font-size: 6rem;">500</h1>
    <h2 class="mb-4 fw-bold">Error del Servidor</h2>
    <p class="lead text-muted mb-5 max-w-md mx-auto">Lo sentimos, nuestro sistema está experimentando dificultades técnicas inesperadas. Por favor, intenta de nuevo más tarde.</p>
    <a href="{{ route('home') }}" class="btn btn-dark btn-lg px-5 py-3 rounded-pill">Volver al Inicio</a>
</div>
@endsection
