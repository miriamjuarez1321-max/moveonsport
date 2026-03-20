@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<div class="container">
    <div class="auth-card animate__animated animate__fadeIn">
        <div class="auth-header">
            <i class="bi bi-shield-check" style="color: #0b3d2e;"></i>
            <h2>Verificar código</h2>
            <p class="text-muted">Ingresa el código de 6 dígitos que enviamos a <br><strong>{{ $email }}</strong></p>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-4 p-3 mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.verify') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            
            <div class="mb-4">
                <input type="text" name="codigo" id="codigo" class="form-control text-center py-3 rounded-4 fw-bold fs-3 @error('codigo') is-invalid @enderror" 
                       placeholder="000000" maxlength="6" pattern="\d{6}" required autofocus autocomplete="off">
                @error('codigo')
                    <span class="text-danger small mt-2 d-block text-center">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-auth">Verificar código</button>
            
            <div class="auth-footer">
                <p class="mb-0 text-muted">¿No recibiste el código?</p>
                <a href="{{ route('password.request') }}" class="text-decoration-none fw-bold" style="color: #4CAF50;">Reenviar código</a>
            </div>
        </form>
    </div>
</div>
@endsection
