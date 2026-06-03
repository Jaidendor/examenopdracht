{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

@section('title', 'Hoe werkt COM in Beeld? – Stap voor stap uitleg')
@section('meta_description', 'Leer hoe je COM in Beeld gebruikt. Volg onze stap-voor-stap handleiding en bekijk veelgestelde vragen over de communicatieapp voor kinderen.')

{{-- FAQPage structured data: Google toont FAQ vragen direct in zoekresultaten --}}
@push('styles')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        {
            "@@type": "Question",
            "name": "Voor wie is COM in Beeld bedoeld?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "COM in Beeld is bedoeld voor kinderen met een communicatiebeperking, zoals kinderen met autisme, een spraak- of taalstoornis, of een verstandelijke beperking."
            }
        },
        {
            "@@type": "Question",
            "name": "Is COM in Beeld beschikbaar als app?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Ja! COM in Beeld is een app die je kunt downloaden op je telefoon, tablet of iPad. De app is beschikbaar voor zowel Android als iOS."
            }
        },
        {
            "@@type": "Question",
            "name": "Wat doe ik als ik een probleem heb?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Neem contact met ons op via de contactpagina. Wij helpen je zo snel mogelijk verder."
            }
        }
    ]
}
</script>
@endpush
@push('styles')
<style>
    /* ==================== HERO ==================== */
    .uitleg-hero {
        background-color: #111111;
        color: #ffffff;
        padding: 80px 20px;
        text-align: center;
    }

    .uitleg-hero-label {
        display: inline-block;
        background-color: #FFD600;
        color: #111111;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 4px;
        margin-bottom: 18px;
    }

    .uitleg-hero h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 14px;
        line-height: 1.2;
    }

    .uitleg-hero p {
        color: #cccccc;
        font-size: 1.1rem;
        max-width: 550px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* ==================== STAPPEN SECTIE ==================== */
    .stappen-sectie {
        max-width: 900px;
        margin: 70px auto;
        padding: 0 20px;
    }

    .stappen-sectie h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111111;
        text-align: center;
        margin-bottom: 50px;
    }

    .stap {
        display: grid;
        grid-template-columns: 60px 1fr;
        gap: 25px;
        margin-bottom: 40px;
        align-items: start;
    }

    .stap-nummer {
        width: 60px;
        height: 60px;
        background-color: #FFD600;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        color: #111111;
        flex-shrink: 0;
    }

    .stap-inhoud h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 8px;
        margin-top: 12px;
    }

    .stap-inhoud p {
        font-size: 0.95rem;
        color: #555555;
        line-height: 1.7;
    }

    /* Verticale lijn tussen stappen */
    .stap-lijn {
        width: 2px;
        height: 30px;
        background-color: #FFD600;
        margin-left: 29px;
    }

    /* ==================== DEMO SECTIE ==================== */
    .demo-sectie {
        background-color: #f5f5f5;
        padding: 70px 20px;
        text-align: center;
        border-top: 3px solid #FFD600;
        border-bottom: 3px solid #FFD600;
    }

    .demo-sectie h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 12px;
    }

    .demo-sectie p {
        color: #666666;
        margin-bottom: 30px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .demo-placeholder {
        max-width: 700px;
        margin: 0 auto;
        background-color: #111111;
        border-radius: 12px;
        padding: 60px 20px;
        color: #cccccc;
        font-size: 1rem;
    }

    .demo-placeholder span {
        font-size: 3rem;
        display: block;
        margin-bottom: 10px;
    }

    /* ==================== FAQ SECTIE ==================== */
    .faq-sectie {
        max-width: 800px;
        margin: 70px auto;
        padding: 0 20px;
    }

    .faq-sectie h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111111;
        text-align: center;
        margin-bottom: 40px;
    }

    .faq-item {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        margin-bottom: 12px;
        overflow: hidden;
    }

    .faq-vraag {
        width: 100%;
        background: none;
        border: none;
        padding: 18px 20px;
        text-align: left;
        font-size: 1rem;
        font-weight: 600;
        color: #111111;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: inherit;
        transition: background-color 0.2s ease;
    }

    .faq-vraag:hover {
        background-color: #f8f8f8;
    }

    .faq-pijl {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
        color: #FFD600;
        flex-shrink: 0;
    }

    .faq-item.open .faq-pijl {
        transform: rotate(180deg);
    }

    .faq-antwoord {
        display: none;
        padding: 0 20px 18px;
        font-size: 0.95rem;
        color: #555555;
        line-height: 1.7;
    }

    .faq-item.open .faq-antwoord {
        display: block;
    }

    /* ==================== CTA ==================== */
    .uitleg-cta {
        background-color: #FFD600;
        padding: 70px 20px;
        text-align: center;
    }

    .uitleg-cta h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 12px;
    }

    .uitleg-cta p {
        color: #333333;
        margin-bottom: 28px;
        max-width: 450px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 600px) {
        .uitleg-hero h1 { font-size: 1.9rem; }
        .stap { grid-template-columns: 50px 1fr; gap: 15px; }
    }
</style>
@endpush

@section('content')

    <!-- HERO -->
    <section class="uitleg-hero">
        <span class="uitleg-hero-label">Wizards of Words — WoW</span>
        <h1>Zo gebruik je <span style="color:#FFD600;">WoW</span></h1>
        <p>COM in Beeld bouwt WoW samen met kinderen. Hier zie je hoe de app werkt.</p>
    </section>

    <!-- STAPPEN -->
    <section class="stappen-sectie">
        <h2>Stap voor stap aan de slag</h2>

        <div class="stap">
            <div class="stap-nummer">1</div>
            <div class="stap-inhoud">
                <h3>Log in</h3>
                <p>
                    Open WoW en log in met de codes die je van COM in Beeld hebt ontvangen.
                </p>
            </div>
        </div>

        <div class="stap-lijn"></div>

        <div class="stap">
            <div class="stap-nummer">2</div>
            <div class="stap-inhoud">
                <h3>Stel je categorieën in</h3>
                <p>
                    Kies in de instellingen welke categorieën en foto's je in de app wilt zien.
                </p>
            </div>
        </div>

        <div class="stap-lijn"></div>

        <div class="stap">
            <div class="stap-nummer">3</div>
            <div class="stap-inhoud">
                <h3>Maak je eigen foto's</h3>
                <p>
                    Fotografeer dingen uit jouw leven. Die foto's worden jouw persoonlijke
                    woordenschat in WoW.
                </p>
            </div>
        </div>

        <div class="stap-lijn"></div>

        <div class="stap">
            <div class="stap-nummer">4</div>
            <div class="stap-inhoud">
                <h3>Bekijk het dashboard</h3>
                <p>
                    Open het dashboard. Daar zie je alle foto's die je hebt gemaakt
                    en kun je ze ordenen.
                </p>
            </div>
        </div>
    </section>

    <!-- DEMO -->
    <section class="demo-sectie">
        <h2>Bekijk WoW in actie</h2>

        <div style="max-width: 800px; margin: 0 auto;">
            <video controls style="width: 100%; border-radius: 12px; border: 3px solid #FFD600;">
                <source src="{{ asset('videos/pava animatie video uitleg.mp4') }}" type="video/mp4">
                Je browser ondersteunt de video tag niet.
            </video>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-sectie">
        <h2>Veelgestelde vragen</h2>

        <div class="faq-item">
            <button class="faq-vraag">
                Voor wie is WoW bedoeld?
                <span class="faq-pijl">▼</span>
            </button>
            <div class="faq-antwoord">
                WoW is gemaakt voor kinderen met autisme, een spraakstoornis of een verstandelijke
                beperking. Begeleiders en ouders gebruiken de app ook, om te volgen wat een kind communiceert.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-vraag">
                Is WoW beschikbaar als app?
                <span class="faq-pijl">▼</span>
            </button>
            <div class="faq-antwoord">
                Je downloadt WoW op je telefoon, tablet of iPad. De app werkt op Android en iOS.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-vraag">
                Kan ik eigen foto's toevoegen?
                <span class="faq-pijl">▼</span>
            </button>
            <div class="faq-antwoord">
                Ja! In het dashboard kun je eigen foto's en categorieën toevoegen zodat de
                software zo goed mogelijk aansluit bij de belevingswereld van het kind.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-vraag">
                Wat doe ik als ik een probleem heb?
                <span class="faq-pijl">▼</span>
            </button>
            <div class="faq-antwoord">
                Stuur een bericht via de <a href="{{ route('contact') }}" style="color:#111111;font-weight:600;">contactpagina</a>.
                We reageren binnen een werkdag.
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="uitleg-cta">
        <h2>Wil je meer weten over WoW?</h2>
        <p>Neem contact op met COM in Beeld Developers en doe mee.</p>
        <a href="{{ route('contact') }}" class="btn btn-dark">Neem contact op</a>
    </section>

@endsection

@push('scripts')
<script>
    // ==================== FAQ ACCORDION ====================
    // Klik op een vraag om het antwoord te tonen of verbergen

    document.querySelectorAll('.faq-vraag').forEach(function(knop) {
        knop.addEventListener('click', function() {
            const item = this.closest('.faq-item');

            // Sluit alle andere open vragen eerst
            document.querySelectorAll('.faq-item.open').forEach(function(openItem) {
                if (openItem !== item) openItem.classList.remove('open');
            });

            // Wissel open/dicht voor de aangeklikte vraag
            item.classList.toggle('open');
        });
    });
</script>
@endpush
