{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

{{-- Paginatitel voor de browser tab --}}
@section('title', 'Home - COM in Beeld')

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
        <span class="hero-label">Communicatiesoftware</span>

        <!-- Hoofdtitel -->
        <h1>Communiceren via <span>beeld</span></h1>

        <!-- Ondertitel / beschrijving -->
        <p>
            COM in Beeld helpt kinderen met een beperking om beter te communiceren
            met behulp van symbolen en afbeeldingen. Eenvoudig, effectief en toegankelijk.
        </p>

        <!-- Knoppen: "Aan de slag" en "Meer info" -->
        <div class="hero-buttons">
            <a href="#" class="btn btn-primary">Aan de slag</a>
            <a href="#how-it-works" class="btn btn-secondary">Meer informatie</a>
        </div>
    </section>
    <!-- ==================== EINDE HERO ==================== -->

    <!-- ==================== FEATURES SECTIE ==================== -->
    <!-- Drie kaarten met de voordelen van de software -->
    <section class="features">
        <div class="features-header">
            <h2>Waarom COM in Beeld?</h2>
            <p>Onze software is speciaal ontwikkeld voor kinderen die moeite hebben met communiceren.</p>
        </div>

        <!-- Grid met 3 feature kaarten -->
        <div class="features-grid">

            <!-- Kaart 1: Eenvoudig -->
            <div class="feature-card">
                <div class="feature-icon">🖼️</div>
                <h3>Beeldcommunicatie</h3>
                <p>
                    Kinderen kunnen communiceren via duidelijke symbolen en afbeeldingen,
                    zonder dat ze tekst hoeven te lezen.
                </p>
            </div>

            <!-- Kaart 2: Eenvoudig te gebruiken -->
            <div class="feature-card">
                <div class="feature-icon">✋</div>
                <h3>Eenvoudig in gebruik</h3>
                <p>
                    De software is intuïtief ontworpen zodat zowel kinderen als
                    begeleiders het direct kunnen gebruiken.
                </p>
            </div>

            <!-- Kaart 3: Aanpasbaar -->
            <div class="feature-card">
                <div class="feature-icon">⚙️</div>
                <h3>Aanpasbaar</h3>
                <p>
                    Elke gebruiker is uniek. Pas de software aan op de behoeften
                    van het kind met eigen symbolen en categorieën.
                </p>
            </div>

        </div>
    </section>
    <!-- ==================== EINDE FEATURES ==================== -->

    <!-- ==================== HOE WERKT HET SECTIE ==================== -->
    <!-- Stap-voor-stap uitleg van de software -->
    <section class="how-it-works" id="how-it-works">
        <div class="section-header">
            <h2>Hoe werkt het?</h2>
            <p>In vier eenvoudige stappen aan de slag met COM in Beeld.</p>
        </div>

        <!-- De 4 stappen -->
        <div class="steps">

            <!-- Stap 1 -->
            <div class="step">
                <div class="step-number">1</div>
                <h3>Account aanmaken</h3>
                <p>Maak gratis een account aan en stel je profiel in.</p>
            </div>

            <!-- Stap 2 -->
            <div class="step">
                <div class="step-number">2</div>
                <h3>Software instellen</h3>
                <p>Pas de symbolen en categorieën aan voor de gebruiker.</p>
            </div>

            <!-- Stap 3 -->
            <div class="step">
                <div class="step-number">3</div>
                <h3>Beginnen</h3>
                <p>Het kind kan direct beginnen met communiceren via beelden.</p>
            </div>

            <!-- Stap 4 -->
            <div class="step">
                <div class="step-number">4</div>
                <h3>Bijhouden</h3>
                <p>Volg de voortgang en pas de software aan indien nodig.</p>
            </div>

        </div>
    </section>
    <!-- ==================== EINDE HOE WERKT HET ==================== -->

    <!-- ==================== CTA SECTIE ==================== -->
    <!-- Uitnodiging om een account aan te maken -->
    <section class="cta-section">
        <h2>Klaar om te beginnen?</h2>
        <p>
            Maak vandaag nog een gratis account aan en ontdek hoe COM in Beeld
            communicatie eenvoudiger maakt.
        </p>
        <a href="{{ route('login') }}" class="btn btn-dark">Nu beginnen</a>
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
@endpush
