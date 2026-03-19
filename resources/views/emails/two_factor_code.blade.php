<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Poppins', sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background: #0b3d2e; color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 30px; text-align: center; }
        .code { font-size: 32px; font-weight: bold; color: #4CAF50; letter-spacing: 5px; margin: 20px 0; }
        .footer { font-size: 12px; color: #888; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>MoveOn Sport</h1>
        </div>
        <div class="content">
            <h2>Verificación de Inicio de Sesión</h2>
            <p>Se ha detectado un intento de inicio de sesión en tu cuenta. Usa el siguiente código de 6 dígitos para completar el acceso:</p>
            <div class="code">{{ $code }}</div>
            <p>Este código es de un solo uso y expirará en 10 minutos.</p>
            <p>Si no has intentado iniciar sesión, te recomendamos cambiar tu contraseña inmediatamente.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} MoveOn Sport. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
