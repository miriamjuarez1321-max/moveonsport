<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | MoveOn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-register.css') }}">
    <style>
        .requirement { transition: color 0.3s ease; display: block; margin-bottom: 2px; font-size: 12px; }
        .text-success { color: #10b981 !important; }
        .text-danger { color: #ef4444 !important; }
        .mt-2 { margin-top: 0.5rem; }
        .mb-1 { margin-bottom: 0.25rem; }
        .d-none { display: none; }
        
        /* Estilos para el icono de mostrar/ocultar contraseña */
        .password-field-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            font-size: 1.2rem;
            z-index: 10;
            display: flex;
            align-items: center;
        }
        .toggle-password:hover {
            color: #111;
        }
        /* Ajustar padding derecho del input para que el texto no se oculte tras el icono */
        .password-field-container .form-control {
            padding-right: 45px;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo/logotipo.png') }}" alt="MoveOn Logo">
        </a>
        <h1>Crear Cuenta</h1>
    </div>

    <form id="registerForm" method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <div class="password-field-container">
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                    <i class="bi bi-eye"></i>
                </span>
            </div>
            <div id="password-requirements" class="mt-2">
                <span id="req-length" class="requirement text-danger">• Mínimo 8 caracteres</span>
                <span id="req-upper" class="requirement text-danger">• Al menos una letra mayúscula</span>
                <span id="req-lower" class="requirement text-danger">• Al menos una letra minúscula</span>
                <span id="req-number" class="requirement text-danger">• Al menos un número</span>
                <span id="req-symbol" class="requirement text-danger">• Al menos un símbolo (!@#$%&*)</span>
            </div>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <div class="password-field-container">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation', this)">
                    <i class="bi bi-eye"></i>
                </span>
            </div>
            <span id="confirm-password-error" class="error-message d-none">Las contraseñas no coinciden.</span>
        </div>

        <button type="submit" id="submitBtn" class="btn-submit">Registrarse</button>
        
        <div class="auth-links" style="margin-top: 15px; text-align: center;">
            <p style="font-size: 13px; color: #666;">
                Al crear tu cuenta aceptas nuestras 
                <a href="{{ route('legal.privacidad') }}" target="_blank" style="color: #0b3d2e; font-weight: 600; text-decoration: underline;">Políticas y Privacidad</a>.
            </p>
        </div>
        
        <div class="auth-links">
            <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
            <p class="auth-back-wrap">
                <a href="{{ session('url.intended', route('home')) }}" class="auth-back-link">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </p>
        </div>
    </form>
</div>

<script>
function togglePasswordVisibility(inputId, iconElement) {
    const passwordInput = document.getElementById(inputId);
    const icon = iconElement.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const submitBtn = document.getElementById('submitBtn');

    const requirements = {
        length: document.getElementById('req-length'),
        upper: document.getElementById('req-upper'),
        lower: document.getElementById('req-lower'),
        number: document.getElementById('req-number'),
        symbol: document.getElementById('req-symbol')
    };

    const confirmError = document.getElementById('confirm-password-error');

    function validatePassword() {
        const val = passwordInput.value;
        
        const checks = {
            length: val.length >= 8,
            upper: /[A-Z]/.test(val),
            lower: /[a-z]/.test(val),
            number: /[0-9]/.test(val),
            symbol: /[!@#$%&*]/.test(val)
        };

        let allValid = true;

        for (const key in checks) {
            if (checks[key]) {
                requirements[key].classList.remove('text-danger');
                requirements[key].classList.add('text-success');
                requirements[key].innerHTML = '✓ ' + requirements[key].innerHTML.split(' ').slice(1).join(' ');
            } else {
                requirements[key].classList.remove('text-success');
                requirements[key].classList.add('text-danger');
                requirements[key].innerHTML = '• ' + requirements[key].innerHTML.split(' ').slice(1).join(' ');
                allValid = false;
            }
        }

        return allValid;
    }

    function validateConfirmPassword() {
        if (confirmPasswordInput.value === '') {
            confirmError.classList.add('d-none');
            return false;
        }

        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmError.classList.remove('d-none');
            confirmPasswordInput.classList.add('is-invalid');
            return false;
        } else {
            confirmError.classList.add('d-none');
            confirmPasswordInput.classList.remove('is-invalid');
            return true;
        }
    }

    passwordInput.addEventListener('input', function() {
        validatePassword();
        validateConfirmPassword();
    });

    confirmPasswordInput.addEventListener('input', validateConfirmPassword);

    form.addEventListener('submit', function(e) {
        const isPasswordValid = validatePassword();
        const isConfirmValid = validateConfirmPassword();

        if (!isPasswordValid || !isConfirmValid) {
            e.preventDefault();
            alert('Por favor, asegúrese de que la contraseña cumpla con todos los requisitos y coincida con la confirmación.');
        }
    });
});
</script>
</body>
</html>
