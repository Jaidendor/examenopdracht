{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

{{-- Paginatitel voor de browser tab --}}
@section('title', 'Inloggen - COM in Beeld')
@section('robots', 'noindex, nofollow')

{{-- Pagina-specifieke CSS stijlen --}}
@push('styles')
<style>
    /* ==================== LOGIN PAGINA STIJLEN ==================== */

    /* De hele pagina heeft een donkere achtergrond */
    .login-page {
        min-height: calc(100vh - 130px); /* Vul de ruimte tussen navbar en footer */
        background-color: #111111;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    /* De witte kaart in het midden met het formulier */
    .login-card {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 50px 40px;
        width: 100%;
        max-width: 430px; /* Maximale breedte van de kaart */
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    /* Logo/merknaam bovenaan de kaart */
    .login-logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-logo-text {
        display: inline-block;
        background-color: #FFD600; /* Gele achtergrond */
        color: #111111;
        font-size: 1.1rem;
        font-weight: 700;
        padding: 8px 20px;
        border-radius: 6px;
        letter-spacing: 1px;
        text-decoration: none;
    }

    /* Titel van het loginformulier */
    .login-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111111;
        text-align: center;
        margin-bottom: 8px;
    }

    /* Subtitel/ondertitel */
    .login-subtitle {
        text-align: center;
        color: #666666;
        font-size: 0.95rem;
        margin-bottom: 35px;
    }

    /* ==================== FORMULIER STIJLEN ==================== */

    /* Groep van een label + input veld */
    .form-group {
        margin-bottom: 20px;
    }

    /* Label boven het input veld */
    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #111111;
        margin-bottom: 6px;
    }

    /* De invoervelden (email, wachtwoord) */
    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e0e0e0; /* Grijze rand */
        border-radius: 8px;
        font-size: 1rem;
        color: #111111;
        background-color: #ffffff;
        transition: border-color 0.3s ease;
        box-sizing: border-box; /* Zorgt dat padding niet de breedte vergroot */
    }

    /* Als het veld geselecteerd is, wordt de rand geel */
    .form-input:focus {
        outline: none;
        border-color: #FFD600; /* Gele rand bij focus */
        box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.2); /* Zachte gele gloed */
    }

    /* Foutmelding onder een invoerveld */
    .form-error {
        display: block;
        margin-top: 5px;
        font-size: 0.85rem;
        color: #e74c3c; /* Rode kleur voor foutmeldingen */
    }

    /* Rij met "Onthoud mij" en "Wachtwoord vergeten" */
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 10px;
    }

    /* Checkbox met label */
    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
        color: #333333;
        cursor: pointer;
    }

    /* Stijl voor de checkbox */
    .remember-me input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #FFD600; /* Gele checkbox */
        cursor: pointer;
    }

    /* Link "Wachtwoord vergeten?" */
    .forgot-password {
        font-size: 0.9rem;
        color: #111111;
        text-decoration: none;
        font-weight: 500;
    }

    .forgot-password:hover {
        color: #FFD600; /* Geel bij hoveren */
    }

    /* De inlogknop */
    .btn-login {
        width: 100%; /* Volledige breedte */
        padding: 14px;
        background-color: #FFD600; /* Gele achtergrond */
        color: #111111;
        font-size: 1rem;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.1s ease;
        margin-bottom: 20px;
    }

    /* Hover effect op de inlogknop */
    .btn-login:hover {
        background-color: #e6c200; /* Iets donkerder geel */
    }

    /* Als de knop ingedrukt wordt */
    .btn-login:active {
        transform: scale(0.99);
    }

    /* Scheidingslijn met "of" tekst */
    .divider {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .divider-line {
        flex: 1;
        height: 1px;
        background-color: #e0e0e0;
    }

    .divider-text {
        color: #999999;
        font-size: 0.85rem;
    }

    /* Link onderaan om te registreren */
    .register-link {
        text-align: center;
        font-size: 0.9rem;
        color: #666666;
    }

    .register-link a {
        color: #111111;
        font-weight: 600;
        text-decoration: none;
    }

    .register-link a:hover {
        color: #FFD600; /* Geel bij hoveren */
    }

    /* ==================== SUCCES/FOUT BERICHTEN ==================== */
    /* Laravel stuurt soms berichten terug na een actie */

    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    /* Groene alert voor succes */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    /* Rode alert voor foutmeldingen */
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* ==================== RESPONSIVE (mobiel) ==================== */
    @media (max-width: 480px) {
        .login-card {
            padding: 35px 25px; /* Minder padding op kleine schermen */
        }
    }
</style>
@endpush

{{-- Inhoud van de loginpagina --}}
@section('content')

    <!-- ==================== LOGIN SECTIE ==================== -->
    <div class="login-page">

        <!-- De inlogkaart in het midden van de pagina -->
        <div class="login-card">

            <!-- Logo bovenaan de kaart -->
            <div class="login-logo">
                <a href="{{ route('home') }}" class="login-logo-text">COM in Beeld</a>
            </div>

            <!-- Titel en ondertitel -->
            <h1 class="login-title">Welkom terug</h1>
            <p class="login-subtitle">Log in op je account om verder te gaan</p>

            <!-- Toon succes bericht als het er is (bijv. na registratie) -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- ==================== HET LOGINFORMULIER ==================== -->
            <!-- De actie verwijst naar de Laravel login route -->
            <!-- @csrf is een beveiligingstoken van Laravel -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- E-mailadres veld -->
                <div class="form-group">
                    <label for="email" class="form-label">E-mailadres</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        placeholder="jouw@email.nl"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                    <!-- Toon foutmelding als het e-mailadres niet klopt -->
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Wachtwoord veld -->
                <div class="form-group">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <!-- Container voor wachtwoord veld en toon/verberg knop -->
                    <div style="position: relative;">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="••••••••"
                            required
                            style="padding-right: 50px;"
                        >
                        <!-- Knop om wachtwoord zichtbaar te maken -->
                        <button
                            type="button"
                            id="togglePassword"
                            style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 1.1rem; color: #666;"
                            title="Wachtwoord tonen/verbergen"
                        >👁️</button>
                    </div>
                    <!-- Toon foutmelding als het wachtwoord niet klopt -->
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Rij: "Onthoud mij" checkbox en "Wachtwoord vergeten" link -->
                <div class="form-options">

                    <!-- Onthoud mij checkbox -->
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Onthoud mij
                    </label>

                    <!-- Wachtwoord vergeten link (alleen als die route bestaat) -->
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Wachtwoord vergeten?
                        </a>
                    @endif

                </div>

                <!-- Inlogknop -->
                <button type="submit" class="btn-login">
                    Inloggen
                </button>

            </form>
            <!-- ==================== EINDE FORMULIER ==================== -->

            <!-- Scheidingslijn -->
            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">of</span>
                <div class="divider-line"></div>
            </div>

            <!-- Link naar registratiepagina -->
            <p class="register-link">
                Nog geen account?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registreer je hier</a>
                @else
                    <a href="#">Registreer je hier</a>
                @endif
            </p>

        </div>
    </div>
    <!-- ==================== EINDE LOGIN SECTIE ==================== -->

@endsection

{{-- Pagina-specifieke JavaScript --}}
@push('scripts')
<script>
    // ==================== WACHTWOORD TONEN/VERBERGEN ====================
    // De gebruiker kan het wachtwoord zichtbaar maken door op het oogje te klikken

    const togglePasswordBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePasswordBtn.addEventListener('click', function() {
        // Controleer het huidige type van het wachtwoord veld
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';    // Maak wachtwoord zichtbaar
            this.textContent = '🙈';        // Verander het icoontje
        } else {
            passwordInput.type = 'password'; // Verberg wachtwoord weer
            this.textContent = '👁️';         // Zet origineel icoontje terug
        }
    });
</script>
@endpush
