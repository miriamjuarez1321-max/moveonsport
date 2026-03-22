<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-brand">
            <img src="{{ asset('images/logo/logo.png') }}" alt="MoveOn Sport" class="footer-logo">
            <p class="footer-desc">Moda deportiva sostenible con enfoque en rendimiento, calidad y estilo.</p>
        </div>
        <div class="footer-support">
            <h4>Atención al cliente</h4>
            <ul>
                <li><a href="{{ route('legal.devoluciones') }}">Cambios y devoluciones</a></li>
                <li><a href="{{ route('legal.privacidad') }}">Políticas y privacidad</a></li>
                <li><a href="{{ route('legal.terminos') }}">Términos y condiciones</a></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h4>Contacto</h4>
            <ul>
                <li><a href="mailto:Moveonsport720@gmail.com">Moveonsport720@gmail.com</a></li>
                <li><a href="tel:+52 919-180-8743">+52 919-180-8743</a></li>
                <li>Ocosingo, Chiapas</li>
            </ul>
            <div class="footer-social">
                <a href="https://www.instagram.com/moveon_sport.0?igsh=ZzV2ODZxd211dnAw" aria-label="Instagram" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg>
                </a>
                <a href="https://www.facebook.com/share/1B1qwoVfpw/?mibextid=wwXIfr" aria-label="Facebook" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="https://www.tiktok.com/@moveon_sport" target="_blank" aria-label="TikTok" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2v14.5a3.5 3.5 0 1 1-3-3.45v2.2a1.5 1.5 0 1 0 1 1.41V2h2z"/>
                    </svg>
                </a>
                
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© {{ date('Y') }} MoveOn Sport. Todos los derechos reservados.</span>
    </div>
</footer>
