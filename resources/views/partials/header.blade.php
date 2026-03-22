<header class="main-header">
    <div class="header-container">

        <div class="logo-box">
            <img src="{{ asset('images/logo/logo.png') }}">
            <span>MoveOn Sport</span>
        </div>

        <div class="header-search-container">
            <form action="{{ route('collections') }}" method="GET" class="search-form">
                <div class="search-input-group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar productos..." class="search-input">
                    <button type="submit" class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <nav class="nav-links collapse" id="navMenu">
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('collections') }}">Colecciones</a>
            <a href="{{ route('nosotros') }}">Nosotros</a>
            <a href="{{ route('contacto') }}">Contacto</a>
            
            @auth
                <div style="display: flex; align-items: center; gap: 5px;">
                    <!-- Carrito a la izquierda -->
                    <a href="{{ route('cart.index') }}" style="position: relative; display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; text-decoration: none; color: white; transition: opacity 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:block;">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        @php $cartCount = auth()->user()->carritos()->sum('cantidad'); @endphp
                        @if($cartCount > 0)
                            <span class="cart-count-badge" style="position: absolute; top: 0; right: 0; background: #ef4444; color: white; border-radius: 50%; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold; border: 2px solid #003020;">
                                {{ $cartCount }}
                            </span>
                        @else
                            <span class="cart-count-badge d-none" style="position: absolute; top: 0; right: 0; background: #ef4444; color: white; border-radius: 50%; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold; border: 2px solid #003020;">
                                0
                            </span>
                        @endif
                    </a>

                    <!-- Perfil a la Derecha -->
                    <div style="position: relative; display: inline-block;" id="profileDropdownContainer">
                        <button id="profileBtn" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); cursor: pointer; display: flex; align-items: center; gap: 10px; font-family: 'Poppins', sans-serif; padding: 6px 14px; border-radius: 30px; transition: background 0.2s ease, border-color 0.2s ease; color: white;">
                            @if(auth()->user()->profile_photo)
                                <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Perfil" style="width: 28px; height: 28px; border-radius: 50%; object-fit: cover; border: 1px solid rgba(255,255,255,0.5);">
                            @else
                                <div style="width: 28px; height: 28px; border-radius: 50%; background: #059669; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 13px; border: 1px solid rgba(255,255,255,0.5);">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <span style="font-weight: 500; font-size: 14px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ auth()->user()->name }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.2s;" id="dropdownArrow">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </button>

                        <!-- Menú Desplegable Auth -->
                        <div id="dropdownMenu" style="position: absolute; right: 0; top: 130%; background: white; min-width: 200px; width: max-content; max-width: 80vw; border-radius: 12px; box-shadow: 0 12px 30px rgba(0,0,0,0.18); border: 1px solid #e5e7eb; overflow: hidden; z-index: 9999; opacity: 0; transform: translateY(6px); transition: opacity 0.2s ease, transform 0.2s ease; pointer-events: none; display: block;">
                            <div style="padding: 12px; background: #f9fafb; border-bottom: 1px solid #e5e7eb;">
                                <p style="margin: 0; font-size: 11px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Mi Perfil</p>
                                <p style="margin: 3px 0 0 0; font-weight: 600; color: #111827; font-size: 14px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ auth()->user()->name }}</p>
                            </div>
                            <div style="padding: 6px;">
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.products.index') }}" class="dropdown-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; color: #374151; border-radius: 8px; text-decoration: none; font-size: 14px;">
                                        <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="2"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                                        Gestión de productos
                                    </a>
                                    <a href="{{ route('admin.users.index') }}" class="dropdown-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; color: #374151; border-radius: 8px; text-decoration: none; font-size: 14px;">
                                        <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                        Gestión de usuarios
                                    </a>
                                    <a href="{{ route('admin.orders.index') }}" class="dropdown-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; color: #374151; border-radius: 8px; text-decoration: none; font-size: 14px;">
                                        <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="12" x="2" y="6" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg>
                                        Validación de pagos
                                    </a>
                                    <div style="height: 1px; background: #e5e7eb; margin: 6px 0;"></div>
                                @endif
                                <a href="{{ route('profile.edit') }}" class="dropdown-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; color: #374151; border-radius: 8px; text-decoration: none; font-size: 14px;">
                                    <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                    Editar perfil
                                </a>
                            </div>
                            <div style="padding: 6px; border-top: 1px solid #e5e7eb;">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item danger" style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; color: #dc2626; font-weight: 500; border-radius: 8px; text-decoration: none; font-size: 14px;">
                                    <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 12H8"/><path d="m12 8-4 4 4 4"/></svg>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div style="display: flex; align-items: center; gap: 10px;">
                    <a href="{{ route('login') }}" style="position: relative; display: flex; align-items: center; justify-content: center; width: 56px; height: 56px; text-decoration: none; color: white; transition: opacity 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:block;">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a>
                    <a href="{{ route('login') }}" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: white; text-decoration: none; font-size: 15px; background: #059669; padding: 8px 20px; border-radius: 30px; transition: transform 0.2s;">
                        Ingresar
                    </a>
                </div>
            @endauth
        </nav>

        <!-- Botón hamburguesa -->
         <button class="menu-toggle" id="menuToggle" type="button" aria-controls="navMenu" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#navMenu">
            &#9776;
        </button>

    </div>
</header>
<div id="navOverlay" class="nav-overlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dropdown toggle logic
        const profileContainer = document.getElementById('profileDropdownContainer');
        const profileBtn = document.getElementById('profileBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownArrow = document.getElementById('dropdownArrow');

        if (profileBtn && dropdownMenu) {
            let menuOpen = false;
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                menuOpen = !menuOpen;
                dropdownMenu.style.opacity = menuOpen ? '1' : '0';
                dropdownMenu.style.transform = menuOpen ? 'translateY(0)' : 'translateY(6px)';
                dropdownMenu.style.pointerEvents = menuOpen ? 'auto' : 'none';
                if (dropdownArrow) dropdownArrow.style.transform = menuOpen ? 'rotate(180deg)' : 'rotate(0deg)';
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (profileContainer && !profileContainer.contains(e.target)) {
                    dropdownMenu.style.opacity = '0';
                    dropdownMenu.style.transform = 'translateY(6px)';
                    dropdownMenu.style.pointerEvents = 'none';
                    if (dropdownArrow) dropdownArrow.style.transform = 'rotate(0deg)';
                    menuOpen = false;
                }
            });
        }
    });

    
</script>
