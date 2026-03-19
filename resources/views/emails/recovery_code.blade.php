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
            <h2>Código de Recuperación</h2>
            <p>Has solicitado restablecer tu contraseña. Usa el siguiente código de 6 dígitos para continuar:</p>
            <div class="code">{{ $codigo }}</div>
            <p>Este código expirará en 5 minutos.</p>
            <p>Si no has solicitado este cambio, puedes ignorar este correo de forma segura.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} MoveOn Sport. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
