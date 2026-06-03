{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

@section('title', 'Contact – COM in Beeld')
@section('meta_description', 'Neem contact op met COM in Beeld. Heb je een vraag over de communicatieapp? Stuur ons een bericht en we helpen je zo snel mogelijk verder.')

@push('styles')
<style>
    /* ==================== HERO ==================== */
    .contact-hero {
        background-color: #111111;
        color: #ffffff;
        padding: 70px 20px;
        text-align: center;
    }

    .contact-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .contact-hero h1 span {
        color: #FFD600;
    }

    .contact-hero p {
        color: #cccccc;
        font-size: 1.05rem;
    }

    /* ==================== HOOFDINHOUD ==================== */
    /* Twee kolommen: formulier links, contactinfo rechts */
    .contact-content {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 50px;
        align-items: start;
    }

    /* ==================== FORMULIER KAART ==================== */
    .contact-form-card {
        background-color: #f8f8f8;
        border-radius: 12px;
        padding: 40px 35px;
        border: 2px solid #e0e0e0;
    }

    .contact-form-card h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 25px;
    }

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

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        padding: 12px 14px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #111111;
        background-color: #ffffff;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
        font-family: inherit;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: #FFD600;
        box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.2);
    }

    .form-textarea {
        resize: vertical;
        min-height: 140px;
    }

    /* Twee velden naast elkaar */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    /* Verzendknop */
    .btn-contact {
        width: 100%;
        padding: 14px;
        background-color: #FFD600;
        color: #111111;
        font-size: 1rem;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-family: inherit;
    }

    .btn-contact:hover {
        background-color: #e6c200;
    }

    /* ==================== CONTACT INFO ==================== */
    .contact-info h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 25px;
    }

    .info-item {
        display: flex;
        gap: 15px;
        align-items: flex-start;
        margin-bottom: 28px;
    }

    .info-icon {
        width: 44px;
        height: 44px;
        background-color: #FFD600;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .info-text h3 {
        font-size: 0.95rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 3px;
    }

    .info-text p {
        font-size: 0.9rem;
        color: #666666;
        line-height: 1.5;
    }

    .info-divider {
        border: none;
        border-top: 1px solid #e0e0e0;
        margin: 30px 0;
    }

    .hours-table {
        width: 100%;
        font-size: 0.9rem;
    }

    .hours-table tr td {
        padding: 5px 0;
        color: #555555;
    }

    .hours-table tr td:last-child {
        text-align: right;
        font-weight: 600;
        color: #111111;
    }

    /* ==================== MELDINGEN ==================== */
    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .contact-content {
            grid-template-columns: 1fr;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .contact-hero h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endpush

@section('content')

    <!-- HERO -->
    <section class="contact-hero">
        <h1>Neem <span>contact</span> op</h1>
        <p>Heb je een vraag of opmerking? Wij helpen je graag verder.</p>
    </section>

    <!-- HOOFDINHOUD -->
    <div class="contact-content">

        <!-- FORMULIER -->
        <div class="contact-form-card">
            <h2>Stuur ons een bericht</h2>

            {{-- Succesmelding na verzending (ingevuld door backend) --}}
            @if(session('success'))
                <div class="alert alert-success">✅ {{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 16px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{--
                Contactformulier verwerking:
                - POST naar contact.store
                - Toont succesmelding via session flash message
            --}}
            <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                @csrf

                <!-- Naam en email naast elkaar -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" class="form-label">Jouw naam</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            placeholder="Jan Jansen"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">E-mailadres</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="jan@email.nl"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                </div>

                <!-- Onderwerp -->
                <div class="form-group">
                    <label for="subject" class="form-label">Onderwerp</label>
                    <select id="subject" name="subject" class="form-select" required>
                        <option value="" disabled selected>Kies een onderwerp...</option>
                        <option value="vraag"        {{ old('subject') == 'vraag'        ? 'selected' : '' }}>Algemene vraag</option>
                        <option value="technisch"    {{ old('subject') == 'technisch'    ? 'selected' : '' }}>Technisch probleem</option>
                        <option value="feedback"     {{ old('subject') == 'feedback'     ? 'selected' : '' }}>Feedback over de software</option>
                        <option value="samenwerking" {{ old('subject') == 'samenwerking' ? 'selected' : '' }}>Samenwerking</option>
                        <option value="anders"       {{ old('subject') == 'anders'       ? 'selected' : '' }}>Anders</option>
                    </select>
                </div>

                <!-- Bericht -->
                <div class="form-group">
                    <label for="message" class="form-label">Jouw bericht</label>
                    <textarea
                        id="message"
                        name="message"
                        class="form-textarea"
                        placeholder="Schrijf hier je bericht..."
                        required
                    >{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn-contact">Bericht versturen</button>
            </form>
        </div>

        <!-- CONTACT INFO -->
        <div class="contact-info">
            <h2>Contactgegevens</h2>

            <div class="info-item">
                <div class="info-icon">📧</div>
                <div class="info-text">
                    <h3>E-mailadres</h3>
                    <p>info@camonwheels.nl</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📞</div>
                <div class="info-text">
                    <h3>Telefoonnummer</h3>
                    <p>+31 (0)6 42242933</p>
                    <p>+31 (0)6 11534731</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📍</div>
                <div class="info-text">
                    <h3>Locatie</h3>
                    <p>Insulindestraat 80 - 82 - 84, 3038 JB Rotterdam</p>
                </div>
            </div>

            <hr class="info-divider">

            <h3 style="font-size: 1rem; font-weight: 700; color: #111111; margin-bottom: 12px;">
                Bereikbaarheid
            </h3>
            <table class="hours-table">
                <tr>
                    <td>Maandag – Vrijdag</td>
                    <td>09:00 – 17:00</td>
                </tr>
                <tr>
                    <td>Zaterdag</td>
                    <td>Gesloten</td>
                </tr>
                <tr>
                    <td>Zondag</td>
                    <td>Gesloten</td>
                </tr>
            </table>
        </div>

    </div>

@endsection

@push('scripts')
<script>
    // Controleer of een onderwerp is geselecteerd voor verzending
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        if (!document.getElementById('subject').value) {
            e.preventDefault();
            alert('Kies een onderwerp voordat je het bericht verstuurt.');
        }
    });
</script>
@endpush
