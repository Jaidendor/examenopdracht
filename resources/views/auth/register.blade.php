{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

{{-- Paginatitel --}}
@section('title', 'Registreren - COM in Beeld')
@section('robots', 'noindex, nofollow')

{{-- Pagina-specifieke CSS --}}
@push('styles')
<style>
    /* ==================== REGISTER PAGINA STIJLEN ==================== */
    /* Dezelfde stijl als de loginpagina voor consistentie */

    .register-page {
        min-height: calc(100vh - 130px);
        background-color: #111111; /* Zwarte achtergrond */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    /* De witte kaart in het midden */
    .register-card {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 50px 40px;
        width: 100%;
        max-width: 430px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    /* Logo bovenaan */
    .register-logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .register-logo-text {
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

    /* Titel */
    .register-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111111;
        text-align: center;
        margin-bottom: 8px;
    }

    /* Ondertitel */
    .register-subtitle {
        text-align: center;
        color: #666666;
        font-size: 0.95rem;
        margin-bottom: 35px;
    }

    /* ==================== FORMULIER STIJLEN ==================== */

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #111111;
        margin-bottom: 6px;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        color: #111111;
        background-color: #ffffff;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
    }

    /* Gele rand bij focus */
    .form-input:focus {
        outline: none;
        border-color: #FFD600;
        box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.2);
    }

    /* Foutmelding onder een veld */
    .form-error {
        display: block;
        margin-top: 5px;
        font-size: 0.85rem;
        color: #e74c3c; /* Rood */
    }

    /* Wachtwoord sterkte indicator */
    .password-strength {
        margin-top: 6px;
        font-size: 0.8rem;
        color: #999999;
    }

    /* Registreer knop */
    .btn-register {
        width: 100%;
        padding: 14px;
        background-color: #FFD600; /* Geel */
        color: #111111;
        font-size: 1rem;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.1s ease;
        margin-bottom: 20px;
    }

    .btn-register:hover {
        background-color: #e6c200; /* Iets donkerder geel */
    }

    .btn-register:active {
        transform: scale(0.99);
    }

    /* Link onderaan naar de loginpagina */
    .login-link {
        text-align: center;
        font-size: 0.9rem;
        color: #666666;
    }

    .login-link a {
        color: #111111;
        font-weight: 600;
        text-decoration: none;
    }

    .login-link a:hover {
        color: #FFD600; /* Geel bij hoveren */
    }

    /* ==================== RESPONSIVE (mobiel) ==================== */
    @media (max-width: 480px) {
        .register-card {
            padding: 35px 25px;
        }
    }
</style>
@endpush

{{-- Inhoud van de registerpagina --}}
@section('content')

    <!-- ==================== REGISTER SECTIE ==================== -->
    <div class="register-page">

        <div class="register-card">

            <!-- Logo bovenaan -->
            <div class="register-logo">
                <a href="{{ route('home') }}" class="register-logo-text">COM in Beeld</a>
            </div>

            <!-- Titel en ondertitel -->
            <h1 class="register-title">Account aanmaken</h1>
            <p class="register-subtitle">Maak gratis een account aan om te beginnen</p>

            <!-- ==================== HET REGISTRATIEFORMULIER ==================== -->
            <!-- action verwijst naar de register POST route -->
            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                <!-- Naam veld -->
                <div class="form-group">
                    <label for="name" class="form-label">Volledige naam</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input"
                        placeholder="Jan Jansen"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                    <!-- Toon foutmelding als de naam niet klopt -->
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

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
                    >
                    <!-- Toon foutmelding als het e-mailadres al bestaat -->
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Wachtwoord veld -->
                <div class="form-group">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <div style="position: relative;">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Minimaal 8 tekens"
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
                    <!-- Kleine hint voor de gebruiker -->
                    <span class="password-strength">Minimaal 8 tekens</span>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Wachtwoord bevestigen veld -->
                <!-- Laravel checkt automatisch of dit overeenkomt met het wachtwoord -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Wachtwoord bevestigen</label>
                    <div style="position: relative;">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Herhaal je wachtwoord"
                            required
                            style="padding-right: 50px;"
                        >
                        <!-- Knop om bevestiging wachtwoord zichtbaar te maken -->
                        <button
                            type="button"
                            id="toggleConfirm"
                            style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 1.1rem; color: #666;"
                            title="Wachtwoord tonen/verbergen"
                        >👁️</button>
                    </div>
                </div>

                <!-- Registreer knop -->
                <button type="submit" class="btn-register">
                    Account aanmaken
                </button>

            </form>
            <!-- ==================== EINDE FORMULIER ==================== -->

            <!-- Link naar de loginpagina -->
            <p class="login-link">
                Heb je al een account?
                <a href="{{ route('login') }}">Log hier in</a>
            </p>

        </div>
    </div>
    <!-- ==================== EINDE REGISTER SECTIE ==================== -->

@endsection

{{-- Pagina-specifieke JavaScript --}}
@push('scripts')
<script>
    // ==================== WACHTWOORD TONEN/VERBERGEN ====================

    // Wachtwoord veld
    const togglePasswordBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePasswordBtn.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            this.textContent = '👁️';
        }
    });

    // Wachtwoord bevestigen veld
    const toggleConfirmBtn = document.getElementById('toggleConfirm');
    const confirmInput = document.getElementById('password_confirmation');

    toggleConfirmBtn.addEventListener('click', function() {
        if (confirmInput.type === 'password') {
            confirmInput.type = 'text';
            this.textContent = '🙈';
        } else {
            confirmInput.type = 'password';
            this.textContent = '👁️';
        }
    });

    // ==================== WACHTWOORD MATCH CONTROLE ====================
    // Toon een foutmelding als de wachtwoorden niet overeenkomen

    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        // Controleer of beide wachtwoorden hetzelfde zijn
        if (passwordInput.value !== confirmInput.value) {
            e.preventDefault(); // Stop het formulier

            // Toon een melding aan de gebruiker
            alert('De wachtwoorden komen niet overeen. Probeer het opnieuw.');
            confirmInput.focus();
        }
    });
</script>
@endpush
