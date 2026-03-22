<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MoveOn Sport</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Global -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS por sección -->
    <link rel="stylesheet" href="{{ asset('css/collections.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nosotros.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    @stack('styles')

</head>
<body>

    <!-- HEADER -->
    @include('partials.header')

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- Toast de notificación global -->
    <div id="cart-toast">
        <i class="bi bi-check-circle-fill"></i>
        <span id="cart-toast-message">¡Producto añadido al carrito!</span>
    </div>

    @if(session('success'))
        <script>
            window.addEventListener('load', function() {
                showToast("{{ session('success') }}");
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            window.addEventListener('load', function() {
                showToast("{{ session('error') }}");
                const toast = document.getElementById('cart-toast');
                if (toast) {
                    toast.style.background = '#ef4444';
                    toast.querySelector('i').className = 'bi bi-exclamation-circle-fill';
                }
            });
        </script>
    @endif

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function showToast(message) {
            const toast = document.getElementById('cart-toast');
            const messageEl = document.getElementById('cart-toast-message');
            if (toast && messageEl) {
                messageEl.textContent = message;
                toast.classList.add('show');
                
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
        }

        // Prevención de Doble Click Global
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    if (this.dataset.submitted === 'true') {
                        e.preventDefault();
                        return;
                    }
                    this.dataset.submitted = 'true';
                    
                    // Encontrar el botón de submit que activó el form (si existe)
                    const submitBtn = document.activeElement && document.activeElement.type === 'submit' 
                        ? document.activeElement 
                        : this.querySelector('button[type="submit"]');
                        
                    if (submitBtn) {
                        // Deshabilitar sin quitar clases ni usar disabled si rompe el CSS
                        submitBtn.style.pointerEvents = 'none';
                        submitBtn.style.opacity = '0.7';
                        // Cambiar temporalmente el texto si no es un icono puro
                        if(!submitBtn.querySelector('i') || submitBtn.textContent.trim().length > 0) {
                            const originalHtml = submitBtn.innerHTML;
                            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Procesando...';
                            // Volver a la normalidad si la página no recarga (ej. error validación html5)
                            setTimeout(() => {
                                submitBtn.style.pointerEvents = 'auto';
                                submitBtn.style.opacity = '1';
                                submitBtn.innerHTML = originalHtml;
                                form.dataset.submitted = 'false';
                            }, 5000);
                        }
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
