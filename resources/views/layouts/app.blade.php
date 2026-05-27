<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Paginatitel: elke pagina kan zijn eigen titel instellen via @section('title') -->
    <title>@yield('title', 'COM in Beeld')</title>

    <!-- Vite zorgt voor het compileren van CSS en JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Elke pagina kan hier extra CSS toevoegen via @push('styles') -->
    @stack('styles')
</head>
<body>

    <!-- ==================== NAVIGATIE ==================== -->
    <!-- De navigatiebalk staat bovenaan elke pagina -->
    <nav class="navbar">
        <div class="navbar-container">

            <!-- Logo / merknaam -->
            <a href="{{ route('home') }}" class="navbar-logo">
                COM in Beeld
            </a>

            <!-- Hamburger knop voor mobiel (wordt getoond op kleine schermen) -->
            <button class="hamburger" id="hamburgerBtn" aria-label="Menu openen">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Navigatielinks -->
            <ul class="navbar-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">Uitleg</a></li>
                <li><a href="#" class="nav-link">Contact</a></li>
                <li><a href="#" class="nav-link">Reviews</a></li>

                <!-- Login/Logout knop afhankelijk van inlogstatus -->
                @auth
                    <!-- Als gebruiker is ingelogd, toon dashboard link en logout -->
                    <li><a href="{{ url('/dashboard') }}" class="btn-nav">Dashboard</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-nav btn-outline" style="background: none; border: 1px solid #FFD600; color: #FFD600; padding: 8px 15px; border-radius: 6px; cursor: pointer;">Uitloggen</button>
                        </form>
                    </li>
                @else
                    <!-- Als gebruiker niet is ingelogd, toon login knop -->
                    <li><a href="{{ route('login') }}" class="btn-nav">Inloggen</a></li>
                @endauth
            </ul>

        </div>
    </nav>
    <!-- ==================== EINDE NAVIGATIE ==================== -->

    <!-- Hoofdinhoud van de pagina -->
    <!-- Elke pagina vult dit in via @section('content') -->
    <main>
        @yield('content')
    </main>

    <!-- ==================== FOOTER ==================== -->
    <footer class="footer">
        <div class="footer-container">

            <!-- Footer kolom 1: Over ons -->
            <div class="footer-col">
                <h3 class="footer-title">COM in Beeld</h3>
                <p class="footer-text">
                    Software die kinderen met een beperking helpt om te communiceren
                    via beeld en symbolen.
                </p>
            </div>

            <!-- Footer kolom 2: Snelle links -->
            <div class="footer-col">
                <h3 class="footer-title">Navigatie</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Uitleg</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>

            <!-- Footer kolom 3: Contact info -->
            <div class="footer-col">
                <h3 class="footer-title">Contact</h3>
                <ul class="footer-links">
                    <li>info@cominbeeld.nl</li>
                    <li>+31 (0)6 12345678</li>
                </ul>
            </div>

        </div>

        <!-- Onderkant van de footer met copyright -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} COM in Beeld. Alle rechten voorbehouden.</p>
        </div>
    </footer>
    <!-- ==================== EINDE FOOTER ==================== -->

    <!-- Elke pagina kan hier extra JavaScript toevoegen via @push('scripts') -->
    @stack('scripts')

</body>
</html>
