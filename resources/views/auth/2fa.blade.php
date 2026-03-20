@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')
<div class="container">
    <div class="auth-card animate__animated animate__fadeIn">
        <div class="auth-header">
            <i class="bi bi-shield-lock-fill"></i>
            <h2>Verificación de acceso</h2>
            <p class="text-muted">Ingresa el código de 6 dígitos enviado a tu correo.</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger rounded-4 p-3 mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('status'))
            <div class="alert alert-success rounded-4 p-3 mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('2fa.verify') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" name="code" class="form-control text-center py-3 rounded-4 fw-bold fs-3" 
                       placeholder="000000" maxlength="6" pattern="\d{6}" required autofocus>
                @error('code')
                    <span class="text-danger small mt-2 d-block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-auth">Verificar y Acceder</button>
        </form>

        <div class="auth-footer">
            <p class="mb-0">¿No recibiste el código?</p>
            <a href="{{ route('2fa.resend') }}" class="text-decoration-none fw-bold" style="color: #4CAF50;">Reenviar código</a>
        </div>
    </div>
</div>
@endsection
