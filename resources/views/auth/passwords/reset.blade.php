@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
@endpush

@section('content')

@include('partials.back-button')

<div class="container">
    <div class="auth-card animate__animated animate__fadeIn">
        <div class="auth-header">
            <i class="bi bi-key-fill" style="color: #0b3d2e;"></i>
            <h2>Nueva contraseña</h2>
            <p class="text-muted">Crea una contraseña segura para tu cuenta.</p>
        </div>

        <form action="{{ route('password.update') }}" method="POST" id="resetPasswordForm">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Nueva contraseña</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" class="form-control py-3 rounded-4 @error('password') is-invalid @enderror" 
                           placeholder="Ingresa tu nueva contraseña" required autocomplete="new-password">
                    <button type="button" class="toggle-password-btn" data-target="password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                
                <!-- Requisitos de contraseña -->
                <div class="password-requirements">
                    <div class="requirement-item" id="req-length">
                        <i class="bi bi-circle"></i> Mínimo 8 caracteres
                    </div>
                    <div class="requirement-item" id="req-upper">
                        <i class="bi bi-circle"></i> Al menos una mayúscula
                    </div>
                    <div class="requirement-item" id="req-lower">
                        <i class="bi bi-circle"></i> Al menos una minúscula
                    </div>
                    <div class="requirement-item" id="req-number">
                        <i class="bi bi-circle"></i> Al menos un número
                    </div>
                </div>

                @error('password')
                    <span class="text-danger small mt-2 d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-bold">Confirmar contraseña</label>
                <div class="password-wrapper">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control py-3 rounded-4" 
                           placeholder="Repite tu contraseña" required autocomplete="new-password">
                    <button type="button" class="toggle-password-btn" data-target="password_confirmation">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-auth" id="submitBtn" disabled>Actualizar contraseña</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const form = document.getElementById('resetPasswordForm');
    const submitBtn = document.getElementById('submitBtn');
    
    // Requisitos
    const reqs = {
        length: document.getElementById('req-length'),
        upper: document.getElementById('req-upper'),
        lower: document.getElementById('req-lower'),
        number: document.getElementById('req-number')
    };

    function validatePassword() {
        const val = passwordInput.value;
        
        const checks = {
            length: val.length >= 8,
            upper: /[A-Z]/.test(val),
            lower: /[a-z]/.test(val),
            number: /[0-9]/.test(val)
        };

        let allValid = true;

        for (const [key, isValid] of Object.entries(checks)) {
            const item = reqs[key];
            const icon = item.querySelector('i');
            
            if (isValid) {
                item.classList.add('valid');
                item.classList.remove('invalid');
                icon.className = 'bi bi-check-circle-fill';
            } else {
                item.classList.remove('valid');
                if (val.length > 0) item.classList.add('invalid');
                icon.className = 'bi bi-circle';
                allValid = false;
            }
        }

        submitBtn.disabled = !allValid;
    }

    passwordInput.addEventListener('input', validatePassword);

    // Toggle password visibility
    document.querySelectorAll('.toggle-password-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        });
    });
});
</script>
@endpush
@endsection
