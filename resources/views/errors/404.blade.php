@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center text-center py-5 my-5" style="min-height: 50vh;">
    <h1 class="display-1 fw-bold text-muted" style="font-size: 6rem;">404</h1>
    <h2 class="mb-4 fw-bold">Recurso no encontrado</h2>
    <p class="lead text-muted mb-5 max-w-md mx-auto">Lo sentimos, el producto, usuario o página que buscas no existe en nuestra base de datos o ha sido removido.</p>
    <a href="{{ route('home') }}" class="btn btn-dark btn-lg px-5 py-3 rounded-pill">Volver al Inicio</a>
</div>
@endsection
