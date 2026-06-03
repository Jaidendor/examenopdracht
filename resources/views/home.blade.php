{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

{{-- Paginatitel voor de browser tab --}}
@section('title', 'COM in Beeld – Communicatieapp voor kinderen met een beperking')
@section('meta_description', 'COM in Beeld helpt kinderen met een communicatiebeperking via foto\'s die zij zelf maken. Ontdek hoe de app werkt en maak vandaag nog een gratis account aan.')

{{-- Pagina-specifieke CSS stijlen --}}
@push('styles')
<style>
    /* ==================== HERO SECTIE ==================== */
    /* De grote banner bovenaan de homepagina */
    .hero {
        background-color: #111111; /* Zwarte achtergrond */
        color: #ffffff;            /* Witte tekst */
        padding: 100px 20px;
        text-align: center;
    }

    .hero-label {
        display: inline-block;
        background-color: #FFD600; /* Gele achtergrond voor het label */
        color: #111111;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 20px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Het gele woord in de titel */
    .hero h1 span {
        color: #FFD600;
    }

    .hero p {
        font-size: 1.2rem;
        color: #cccccc; /* Licht grijze tekst voor beschrijving */
        max-width: 550px;
        margin: 0 auto 35px;
        line-height: 1.7;
    }

    /* Knoppen in de hero sectie */
    .hero-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap; /* Wrappen op kleine schermen */
    }

    /* ==================== FEATURES SECTIE ==================== */
    /* Drie kaarten die de voordelen tonen */
    .features {
        padding: 80px 20px;
        background-color: #ffffff;
    }

    .features-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .features-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 10px;
    }

    .features-header p {
        color: #666666;
        font-size: 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Grid van 3 kaarten naast elkaar */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 kolommen */
        gap: 30px;
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Individuele feature kaart */
    .feature-card {
        background-color: #f8f8f8;
        border-radius: 12px;
        padding: 35px 25px;
        text-align: center;
        border: 2px solid transparent;
        transition: border-color 0.3s ease, transform 0.3s ease;
    }

    /* Hover effect op de kaarten */
    .feature-card:hover {
        border-color: #FFD600; /* Gele rand bij hoveren */
        transform: translateY(-5px); /* Kaart gaat iets omhoog */
    }

    /* Het icoontje boven elke kaart */
    .feature-icon {
        width: 60px;
        height: 60px;
        background-color: #FFD600; /* Gele achtergrond */
        border-radius: 50%; /* Rond icoontje */
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.5rem;
    }

    .feature-card h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #111111;
        margin-bottom: 10px;
    }

    .feature-card p {
        color: #666666;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* ==================== HOE WERKT HET SECTIE ==================== */
    .how-it-works {
        padding: 80px 20px;
        background-color: #111111; /* Zwarte achtergrond */
        color: #ffffff;
    }

    .how-it-works .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .how-it-works .section-header h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .how-it-works .section-header p {
        color: #999999;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Stappen als horizontale rij */
    .steps {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* 4 stappen naast elkaar */
        gap: 30px;
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Individuele stap */
    .step {
        text-align: center;
        padding: 20px;
    }

    /* Het stapnummer in een gele cirkel */
    .step-number {
        width: 50px;
        height: 50px;
        background-color: #FFD600; /* Gele achtergrond */
        color: #111111;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0 auto 15px;
    }

    .step h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #ffffff;
    }

    .step p {
        color: #999999;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    /* ==================== CTA SECTIE ==================== */
    /* Call-To-Action: uitnodiging om te beginnen */
    .cta-section {
        background-color: #FFD600; /* Gele achtergrond */
        padding: 80px 20px;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 15px;
    }

    .cta-section p {
        font-size: 1.1rem;
        color: #333333;
        margin-bottom: 30px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ==================== RESPONSIVE (mobiel) ==================== */
    /* Op kleine schermen (tablets en mobielen) */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.2rem; /* Kleinere titel op mobiel */
        }

        .features-grid {
            grid-template-columns: 1fr; /* Kaarten onder elkaar op mobiel */
        }

        .steps {
            grid-template-columns: 1fr 1fr; /* 2 kolommen op tablet */
        }
    }

    @media (max-width: 480px) {
        .steps {
            grid-template-columns: 1fr; /* 1 kolom op mobiel */
        }
    }
</style>
@endpush

{{-- Inhoud van de homepagina --}}
@section('content')

    <!-- ==================== HERO SECTIE ==================== -->
    <!-- De grote welkomstsectie bovenaan de pagina -->
    <section class="hero">
        <!-- Klein label bovenaan -->
        <span class="hero-label">Wizards of Words — WoW</span>

        <!-- Hoofdtitel -->
        <h1>Kinderen bouwen <span>WoW</span> mee</h1>

        <p>
            COM in Beeld maakt Wizards of Words samen met kinderen.
            Zij testen, ontwerpen en beslissen mee over elke stap van de app.
        </p>

        <!-- Knoppen -->
        <div class="hero-buttons">
            <a href="{{ route('uitleg') }}" class="btn btn-primary">Ontdek WoW</a>
            <a href="#how-it-works" class="btn btn-secondary">Meer informatie</a>
        </div>
    </section>
    <!-- ==================== EINDE HERO ==================== -->

    <!-- ==================== FEATURES SECTIE ==================== -->
    <!-- Drie kaarten met de voordelen van de software -->
    <section class="features">
        <div class="features-header">
            <h2>Wat maakt WoW anders</h2>
            <p>COM in Beeld bouwt WoW samen met kinderen, niet namens hen.</p>
        </div>

        <div class="features-grid">

            <!-- Kaart 1 -->
            <div class="feature-card">
                <div class="feature-icon">🧙</div>
                <h3>Kinderen beslissen mee</h3>
                <p>
                    Kinderen testen elke versie van WoW en geven aan wat werkt.
                    COM in Beeld past de app daarop aan.
                </p>
            </div>

            <!-- Kaart 2 -->
            <div class="feature-card">
                <div class="feature-icon">📸</div>
                <h3>Eigen foto's als woordenschat</h3>
                <p>
                    Kinderen maken foto's van dingen uit hun leven. Die foto's worden
                    hun persoonlijke communicatiemiddel in de app.
                </p>
            </div>

            <!-- Kaart 3 -->
            <div class="feature-card">
                <div class="feature-icon">✨</div>
                <h3>Gebouwd op echte feedback</h3>
                <p>
                    Elke knop, elk scherm en elke keuze in WoW komt voort uit wat
                    kinderen zelf zeiden dat werkte.
                </p>
            </div>

        </div>
    </section>
    <!-- ==================== EINDE FEATURES ==================== -->

    <!-- ==================== VIDEO SECTIE ==================== -->
    <section class="how-it-works" id="how-it-works">
        <div class="section-header">
            <h2>Bekijk Wizards of Words in actie</h2>
            <p>Zie hoe kinderen en COM in Beeld WoW samen in gebruik nemen.</p>
        </div>

        <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
            <video controls style="width: 100%; border-radius: 12px; border: 3px solid #FFD600;">
                <source src="{{ asset('videos/pava video voor home pagina.mp4') }}" type="video/mp4">
                Je browser ondersteunt de video tag niet.
            </video>
        </div>
    </section>
    <!-- ==================== EINDE HOE WERKT HET ==================== -->

    <!-- ==================== CTA SECTIE ==================== -->
    <section class="cta-section">
        <h2>Interesse in WoW?</h2>
        <p>Stuur COM in Beeld Developers een bericht. We vertellen je graag meer.</p>
        <a href="{{ route('contact') }}" class="btn btn-dark">Neem contact op</a>
    </section>
    <!-- ==================== EINDE CTA ==================== -->

@endsection

{{-- Pagina-specifieke JavaScript --}}
@push('scripts')
<script>
    // Smooth scroll naar secties wanneer op een link met # wordt geklikt
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            // Controleer of het een anchor link is (niet alleen "#")
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    // Scroll soepel naar de sectie
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
</script>

{{-- Organization structured data: helpt Google het bedrijf te herkennen --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Organization",
    "name": "COM in Beeld",
    "description": "Communicatieapp voor kinderen met een beperking",
    "url": "{{ route('home') }}",
    "contactPoint": {
        "@@type": "ContactPoint",
        "email": "info@cominbeeld.nl",
        "contactType": "customer support",
        "availableLanguage": "Dutch"
    }
}
</script>
@endpush
