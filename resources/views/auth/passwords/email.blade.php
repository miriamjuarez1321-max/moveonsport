@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<div class="container">
    <div class="auth-card animate__animated animate__fadeIn">
        <div class="auth-header">
            <i class="bi bi-envelope-at-fill" style="color: #0b3d2e;"></i>
            <h2>¿Olvidaste tu contraseña?</h2>
            <p class="text-muted">Ingresa tu correo electrónico y te enviaremos un código para restablecerla.</p>
        </div>

        @if(session('status'))
            <div class="alert alert-success rounded-4 p-3 mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label fw-bold">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control py-3 rounded-4 @error('email') is-invalid @enderror" 
                       placeholder="ejemplo@correo.com" required autofocus>
                @error('email')
                    <span class="text-danger small mt-2 d-block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-auth">Enviar código de recuperación</button>
            
            <div class="auth-footer">
                <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #4CAF50;">Volver al inicio de sesión</a>
            </div>
        </form>
    </div>
</div>
@endsection
