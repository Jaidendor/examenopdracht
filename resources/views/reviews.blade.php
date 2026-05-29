{{-- Uitbreiden van de gedeelde layout --}}
@extends('layouts.app')

{{-- Paginatitel --}}
@section('title', 'Reviews - COM in Beeld')

{{-- Pagina-specifieke CSS --}}
@push('styles')
<style>
    /* ==================== HERO SECTIE ==================== */
    /* Lichte banner bovenaan met de paginatitel */
    .reviews-hero {
        background-color: #f5f5f5; /* Lichtgrijs, zelfde gevoel als wireframe */
        border-bottom: 3px solid #FFD600; /* Gele lijn onderaan */
        padding: 60px 20px;
        text-align: center;
    }

    .reviews-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 12px;
    }

    .reviews-hero p {
        font-size: 1.05rem;
        color: #666666;
    }

    /* ==================== HOOFDINHOUD ==================== */
    /* Twee kolommen naast elkaar: formulier links, reviews rechts */
    .reviews-content {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 1fr; /* Twee gelijke kolommen */
        gap: 50px;
        align-items: start; /* Kolommen beginnen bovenaan */
    }

    /* ==================== FORMULIER KAART (links) ==================== */
    .review-form-card {
        background-color: #f8f8f8;
        border-radius: 12px;
        padding: 35px 30px;
        border: 2px solid #e0e0e0;
    }

    .review-form-card h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 25px;
    }

    /* Formulier groep: label + input */
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

    /* Tekstveld (naam) */
    .form-input {
        width: 100%;
        padding: 11px 14px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #111111;
        background-color: #ffffff;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: #FFD600; /* Gele rand bij focus */
        box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.2);
    }

    /* Groot tekstvak (bericht) */
    .form-textarea {
        width: 100%;
        padding: 11px 14px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #111111;
        background-color: #ffffff;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
        font-family: inherit;
        resize: vertical; /* Alleen verticaal vergroten */
        min-height: 120px;
    }

    .form-textarea:focus {
        outline: none;
        border-color: #FFD600;
        box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.2);
    }

    /* ==================== STERREN BEOORDELING ==================== */
    .star-rating {
        display: flex;
        gap: 5px;
        margin-top: 4px;
    }

    /* Elk sterrensymbool */
    .star {
        font-size: 1.8rem;
        color: #e0e0e0; /* Grijs als standaard */
        cursor: pointer;
        transition: color 0.2s ease, transform 0.1s ease;
        line-height: 1;
    }

    /* Gele ster (geselecteerd of gehovered) */
    .star.active,
    .star:hover {
        color: #FFD600;
    }

    .star:hover {
        transform: scale(1.15); /* Iets groter bij hoveren */
    }

    /* Klein label bij de sterren */
    .star-hint {
        font-size: 0.8rem;
        color: #999999;
        margin-top: 5px;
    }

    /* Verborgen input die de sterrenwaardering opslaat */
    #ratingValue {
        display: none;
    }

    /* ==================== VERZENDKNOP ==================== */
    .btn-review {
        width: 100%;
        padding: 13px;
        background-color: #FFD600; /* Geel */
        color: #111111;
        font-size: 1rem;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.1s ease;
        margin-top: 5px;
        font-family: inherit;
    }

    .btn-review:hover {
        background-color: #e6c200;
    }

    .btn-review:active {
        transform: scale(0.99);
    }

    /* ==================== REVIEWS LIJST (rechts) ==================== */
    .reviews-list h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 25px;
    }

    /* Individuele review */
    .review-item {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid #e0e0e0; /* Scheidingslijn tussen reviews */
    }

    /* Laatste review heeft geen scheidingslijn */
    .review-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /* Ronde avatar cirkel */
    .review-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #cccccc; /* Grijs zoals in wireframe */
        flex-shrink: 0; /* Niet kleiner worden */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: 700;
        color: #ffffff;
        background-color: #555555;
    }

    /* Review inhoud naast de avatar */
    .review-body {
        flex: 1;
    }

    /* Naam van de reviewer */
    .review-name {
        font-size: 1rem;
        font-weight: 700;
        color: #111111;
        margin-bottom: 4px;
    }

    /* Sterren van de review */
    .review-stars {
        color: #FFD600; /* Geel */
        font-size: 1rem;
        margin-bottom: 8px;
        letter-spacing: 2px;
    }

    /* Tekst van de review */
    .review-text {
        font-size: 0.9rem;
        color: #555555;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    /* Verwijder knop styling */
    .btn-delete {
        background: none;
        border: none;
        color: #dc3545;
        font-size: 0.8rem;
        cursor: pointer;
        padding: 0;
        text-decoration: underline;
    }

    .btn-delete:hover {
        color: #a71d2a;
        text-decoration: none;
    }

    /* Melding als er nog geen reviews zijn */
    .no-reviews {
        text-align: center;
        color: #999999;
        padding: 40px 0;
        font-size: 0.95rem;
    }

    /* ==================== SUCCES MELDING ==================== */
    /* Getoond nadat een review is ingediend */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    /* ==================== RESPONSIVE (mobiel) ==================== */
    @media (max-width: 768px) {
        /* Kolommen onder elkaar op mobiel */
        .reviews-content {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .reviews-hero h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endpush

{{-- Inhoud van de reviewpagina --}}
@section('content')

    <!-- ==================== HERO SECTIE ==================== -->
    <section class="reviews-hero">
        <h1>Ervaringen & Reviews</h1>
        <p>Wat vinden anderen? Deel ook jouw mening over COM in Beeld!</p>
    </section>

    <!-- ==================== HOOFDINHOUD: FORMULIER + REVIEWS ==================== -->
    <div class="reviews-content">

        <!-- ===== LINKER KOLOM: FORMULIER ===== -->
        <div class="review-form-card">
            <h2>Schrijf een review</h2>

            @if(session('success'))
                <div class="alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-danger">
                    ❌ {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @auth
                <!-- Het reviewformulier -->
                <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST">
                    @csrf

                    <!-- Naam veld -->
                    <div class="form-group">
                        <label for="name" class="form-label">Jouw naam</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            value="{{ Auth::user()->name }}"
                            required
                        >
                    </div>

                    <!-- Sterren beoordeling -->
                    <div class="form-group">
                        <label class="form-label">Beoordeling</label>

                        <!-- De 5 klikbare sterren -->
                        <div class="star-rating" id="starRating">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>

                        <!-- Kleine hint tekst -->
                        <p class="star-hint">Klik op een ster om te beoordelen</p>

                        <!-- Verborgen veld dat de waarde bijhoudt voor de backend -->
                        <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating', 0) }}">
                    </div>

                    <!-- Bericht tekstvak -->
                    <div class="form-group">
                        <label for="message" class="form-label">Jouw bericht</label>
                        <textarea
                            id="message"
                            name="message"
                            class="form-textarea"
                            placeholder="Vertel over jouw ervaring met COM in Beeld..."
                            required
                        >{{ old('message') }}</textarea>
                    </div>

                    <!-- Verzendknop -->
                    <button type="submit" class="btn-review">
                        Review plaatsen
                    </button>

                </form>
            @else
                <p>Je moet <a href="{{ route('login') }}">ingelogd</a> zijn om een review te kunnen plaatsen.</p>
            @endauth
        </div>
        <!-- ===== EINDE LINKER KOLOM ===== -->

        <!-- ===== RECHTER KOLOM: BESTAANDE REVIEWS ===== -->
        <div class="reviews-list">
            <h2>Recente reviews</h2>

            @forelse($reviews as $review)
                <div class="review-item">
                    <!-- Eerste letter van de naam als avatar -->
                    <div class="review-avatar">{{ strtoupper(substr($review->name, 0, 1)) }}</div>
                    <div class="review-body">
                        <p class="review-name">{{ $review->name }}</p>
                        <div class="review-stars">
                            <!-- Toon het aantal sterren dat is gegeven (bijv. 4 volle en 1 lege ster) -->
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </div>
                        <p class="review-text">
                            {{ $review->message }}
                        </p>

                        {{-- Alleen de eigenaar van de review ziet de verwijderknop --}}
                        @if(Auth::id() === $review->user_id)
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze review wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Verwijder review</button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <p class="no-reviews">Er zijn nog geen reviews geplaatst. Wees de eerste!</p>
            @endforelse
        </div>
        <!-- ===== EINDE RECHTER KOLOM ===== -->

    </div>
    <!-- ==================== EINDE HOOFDINHOUD ==================== -->

@endsection

{{-- Pagina-specifieke JavaScript --}}
@push('scripts')
<script>
    // ==================== STERREN BEOORDELING ====================
    // De gebruiker kan op een ster klikken om een beoordeling te geven

    const stars = document.querySelectorAll('.star');       // Alle 5 sterren
    const ratingInput = document.getElementById('ratingValue'); // Verborgen invoerveld
    let selectedRating = 0; // Houdt bij welke ster is geselecteerd

    // Loop door elke ster en voeg events toe
    stars.forEach(star => {

        // Als de muis over een ster gaat: kleur alle sterren tot die ster
        star.addEventListener('mouseover', function() {
            const value = parseInt(this.dataset.value);
            highlightStars(value);
        });

        // Als de muis weggaat: herstel naar de geselecteerde beoordeling
        star.addEventListener('mouseout', function() {
            highlightStars(selectedRating);
        });

        // Als op een ster geklikt wordt: sla de beoordeling op
        star.addEventListener('click', function() {
            selectedRating = parseInt(this.dataset.value);
            ratingInput.value = selectedRating; // Sla op in het verborgen veld
            highlightStars(selectedRating);
        });

    });

    // Functie om sterren te kleuren tot een bepaalde waarde
    function highlightStars(value) {
        stars.forEach(star => {
            const starValue = parseInt(star.dataset.value);
            // Voeg 'active' klasse toe als de ster binnen de beoordeling valt
            star.classList.toggle('active', starValue <= value);
        });
    }

    // ==================== FORMULIER INDIENEN ====================
    // Backend afhandeling wordt nu gedaan via de controller

    const reviewForm = document.getElementById('reviewForm');

    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            // Controleer of een beoordeling is gegeven
            if (parseInt(ratingInput.value) === 0) {
                e.preventDefault();
                alert('Geef eerst een beoordeling door op een ster te klikken.');
            }
        });

        // Initialiseer sterren als er een old value is (bijv. na validatiefout)
        if (parseInt(ratingInput.value) > 0) {
            selectedRating = parseInt(ratingInput.value);
            highlightStars(selectedRating);
        }
    }
</script>
@endpush
