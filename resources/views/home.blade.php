@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/trending.css') }}">
@endpush

@section('content')

<!-- HERO / INICIO -->
<section id="inicio" class="hero-new">
    <div class="hero-background">
        <div class="hero-light-effect"></div>
    </div>
    <div class="container position-relative h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6 hero-content animate__animated animate__fadeInLeft">
                <h1 class="hero-title">MoveOn Sport</h1>
                <p class="hero-subtitle">
                    Donde el estilo se convierte en identidad.<br>
                    Donde la moda deja de seguir tendencias y empieza a crearlas.
                </p>
                <div class="hero-btns mt-4">
                    <a href="{{ route('collections') }}" class="btn-hero-primary">Ver más</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <div class="hero-carousel-container animate__animated animate__fadeInRight">
                    <div class="hero-carousel-track">
                        @foreach($carouselProducts as $product)
                            <a href="{{ route('products.show', $product->id) }}" class="hero-carousel-item">
                                <div class="carousel-card-inner">
                                    <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" loading="lazy">
                                    <div class="carousel-card-info">
                                        <h3 class="carousel-product-name">{{ $product->nombre }}</h3>
                                        <span class="carousel-product-price">${{ number_format($product->precio_venta, 2) }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <!-- Controles del Carrusel -->
                    <div class="carousel-controls">
                        <button class="carousel-btn prev" id="prevBtn"><i class="bi bi-chevron-left"></i></button>
                        <button class="carousel-btn next" id="nextBtn"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <div class="carousel-dots" id="carouselDots"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROMO VIRTUAL STORE -->
<section id="virtual-store-promo" class="promo-video-section">
    <div class="container animate__animated animate__fadeInUp">
        <div class="promo-card">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6 promo-content">
                    <h2 class="promo-title">¿Ya visitaste nuestra tienda virtual?</h2>
                    <p class="promo-subtitle">Descubre una mejor experiencia de compra. Explora nuestras colecciones exclusivas cómodamente y con total seguridad.</p>
                    <a href="{{ route('collections') }}" class="btn-promo-cta">
                        Explorar tienda <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="promo-video-wrapper">
                        <!-- VIDEO REAL -->
                        <div class="promo-video-container">
                            <video class="promo-video-thumb" autoplay muted loop playsinline>
                                <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NUESTRA ESENCIA -->
<section id="esencia">
    <h2 class="section-title">Nuestra esencia</h2>

    <div class="cards">
        <div class="card">
            <h3>Identidad</h3>
            <p>Moda que representa quién eres, no lo que te imponen.</p>
        </div>

        <div class="card">
            <h3>Calidad</h3>
            <p>Diseños pensados para durar, no para una temporada.</p>
        </div>

        <div class="card">
            <h3>Estilo</h3>
            <p>Elegancia moderna con esencia urbana.</p>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lógica del Carrusel Hero
    const track = document.querySelector('.hero-carousel-track');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dotsContainer = document.getElementById('carouselDots');
    const items = document.querySelectorAll('.hero-carousel-item');
    
    if (track && items.length > 0) {
        let currentIndex = 0;
        let autoplayInterval;

        // Crear dots
        items.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.dot');

        function updateCarousel() {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
            resetAutoplay();
        }

        function startAutoplay() {
            autoplayInterval = setInterval(nextSlide, 4000);
        }

        function resetAutoplay() {
            clearInterval(autoplayInterval);
            startAutoplay();
        }

        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoplay();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoplay();
        });

        track.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
        track.addEventListener('mouseleave', () => startAutoplay());

        startAutoplay();
    }

    // Lógica AJAX para el carrito (actualizada para soportar ambas secciones)
    document.querySelectorAll('.ajax-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                    return;
                }
                return response.json();
            })
            .then(data => {
                if (data && data.success) {
                    if (typeof showToast === 'function') {
                        showToast(data.message);
                    }
                    const cartBadge = document.querySelector('.cart-count-badge');
                    if (cartBadge && data.cart_count !== undefined) {
                        cartBadge.textContent = data.cart_count;
                        cartBadge.classList.remove('d-none');
                    }
                }
            })
            .catch(error => console.error('Error:', error))
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    });
});
</script>
@endpush
