<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HYL Service - Plateforme de Voitures Luxe')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <h1><a href="{{ route('home') }}" style="text-decoration:none;color:inherit;"><i class="fas fa-car"></i> HYL Service</a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">ACCUEIL</a></li>
                    <li><a href="{{ route('acheter') }}" class="{{ request()->routeIs('acheter*') ? 'active' : '' }}">ACHETER</a></li>
                    <li><a href="{{ route('vendre') }}" class="{{ request()->routeIs('vendre') ? 'active' : '' }}">VENDRE</a></li>
                    <li><a href="{{ route('reprise') }}" class="{{ request()->routeIs('reprise') ? 'active' : '' }}">REPRISE</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            PLUS <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('contact') }}"><i class="fas fa-phone"></i> Contact</a></li>
                            <li><a href="{{ route('services') }}"><i class="fas fa-cogs"></i> Services</a></li>
                            <li><a href="{{ route('admin.login') }}"><i class="fas fa-shield-alt"></i> Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Adresse</h4>
                    <p>90, Boulevard My Slimane<br>Casablanca 20250, Maroc</p>
                </div>
                <div class="footer-section">
                    <h4><i class="fas fa-phone"></i> Téléphones</h4>
                    <p><a href="tel:+212522112323">+212 5 22 11 23 23</a></p>
                    <p><a href="tel:+212277765890">+212 2 77 65 80 90</a></p>
                </div>
                <div class="footer-section">
                    <h4><i class="fas fa-envelope"></i> Email</h4>
                    <p><a href="mailto:contact@hylservice.ma">contact@hylservice.ma</a></p>
                </div>
                <div class="footer-section">
                    <h4><i class="fas fa-link"></i> Liens Rapides</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('acheter') }}">Acheter</a></li>
                        <li><a href="{{ route('vendre') }}">Vendre</a></li>
                        <li><a href="{{ route('reprise') }}">Reprise</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} HYL Service. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- DARK MODE -->
    <button class="dark-toggle" id="darkBtn">
        <i class="fas fa-moon"></i>
    </button>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
