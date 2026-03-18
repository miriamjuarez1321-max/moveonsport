@extends('layouts.app')

@section('content')

<section class="contact-hero">
    <div class="hero-bg-overlay"></div>
    <div class="hero-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    <div class="contact-hero-content">
        <h1 class="animate-up">Contacto <br><span class="gradient-text">MoveOn Sport</span></h1>
        <p class="animate-up-delay">Conecta con MoveOn Sport</p>
    </div>
</section>

<section class="contact-container">

    <div class="contact-info">
        <h2>Hablemos</h2>
        <p>
        ¿Tienes alguna pregunta o quieres más información? Escríbenos por redes sociales, correo o llámanos. Estamos aquí para ayudarte.
        </p>

        <div class="info-box">
            <p><strong>Email:</strong> Moveonsport720@gmail.com</p>
            <p><strong>Teléfono:</strong> +52 919-180-8743</p>
            <p><strong>Ubicación:</strong> Ocosingo Chiapas </p>
        </div>
    </div>

</section>
<section class="contact-social">
    <h2>Síguenos en nuestras redes sociales</h2>
    <ul class="social-list">
        <li>
            <a href="https://www.instagram.com/moveon_sport.0?igsh=ZzV2ODZxd211dnAw" target="_blank" rel="noopener" class="social-link instagram">
                <span class="social-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="3" width="18" height="18" rx="5" ry="5" stroke="currentColor" stroke-width="2"/>
                        <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/>
                        <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/>
                    </svg>
                </span>
                <span>Instagram</span>
            </a>
        </li>
        <li>
            <a href="https://www.tiktok.com/@moveon_sport?_r=1&_d=f1da81799d7gh6&sec_uid=MS4wLjABAAAAQlytE-Mrou-UPsIgHmLL6JN83FVl95fRyDA2dqyAsH4uGLLqijyu1aG_kCJicgAj&share_author_id=7302647814386451462&sharer_language=es&source=h5_m&u_code=eb57d5b127c129&item_author_type=1&utm_source=copy&tt_from=copy&enable_checksum=1&utm_medium=ios&share_link_id=DE0AD36F-0030-4A26-BACF-6ACBD3416B55&user_id=7302647814386451462&sec_user_id=MS4wLjABAAAAQlytE-Mrou-UPsIgHmLL6JN83FVl95fRyDA2dqyAsH4uGLLqijyu1aG_kCJicgAj&social_share_type=4&ug_btm=b8727,b0&utm_campaign=client_share&share_app_id=1233" 
            target="_blank" rel="noopener" class="social-link tiktok">
                <span class="social-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 3v3.2c1.3 1.1 2.9 1.8 4.6 1.8v3.1c-1.7 0-3.3-.5-4.6-1.4V15a5 5 0 1 1-5.9-4.9v3.2a2 2 0 1 0 1.8 2V3h4.1z"/>
                    </svg>
                </span>
                <span>TikTok</span>
            </a>
        </li>
        <li>
            <a href="https://www.facebook.com/share/1B1qwoVfpw/?mibextid=wwXIfr" target="_blank" rel="noopener" class="social-link facebook">
                <span class="social-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 3H16V0h-2.5C9.9 0 8 1.9 8 5v3H5v3.5h3V24h3.5V11.5H16l.5-3.5h-3V5c0-.9.3-2 2-2z"/>
                    </svg>
                </span>
                <span>Facebook</span>
            </a>
        </li>
    </ul>
</section>

@endsection