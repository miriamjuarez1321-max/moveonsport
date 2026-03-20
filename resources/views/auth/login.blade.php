<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión | MoveOn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-login.css') }}">
    <style>
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
        <h1>Iniciar Sesión</h1>
    </div>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <div class="password-field-container">
                <input type="password" id="password" name="password" class="form-control" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                    <i class="bi bi-eye"></i>
                </span>
            </div>
        </div>

        <button type="submit" class="btn-submit">Ingresar</button>
        
        <div class="auth-links">
            <p><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>
            <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
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
</script>
</body>
</html>
