@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/comentarios/comentarios.css') }}">
@endpush

@section('content')
<div class="comentarios-section">
    <div class="container">
        <div class="comentarios-container">
            <h1>Déjanos tu opinión</h1>
            <p class="subtitle">Tu feedback nos ayuda a mejorar MoveOn Sport.</p>

            @if(session('success'))
                <div class="alert alert-success rounded-4 p-3 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('comentarios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Tu Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Escribe tu nombre" value="{{ auth()->check() ? auth()->user()->name : '' }}" required>
                </div>

                <div class="form-group">
                    <label for="comentario">Tu Comentario</label>
                    <textarea id="comentario" name="comentario" rows="5" class="form-control" placeholder="Cuéntanos qué te parece la página o nuestros productos..." required></textarea>
                </div>

                <button type="submit" class="btn-enviar">Enviar Comentario</button>
            </form>
        </div>
    </div>
</div>
@endsection
