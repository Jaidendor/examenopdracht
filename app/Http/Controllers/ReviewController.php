<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Deze controller regelt alles wat met reviews te maken heeft.
 */
class ReviewController extends Controller
{
    /**
     * Toon de reviewpagina met alle bestaande reviews.
     */
    public function index()
    {
        // Haal alle reviews op uit de database, de nieuwste bovenaan
        $reviews = Review::latest()->get();

        // Stuur de reviews door naar de 'reviews' view
        return view('reviews', compact('reviews'));
    }

    /**
     * Sla een nieuwe review op in de database.
     */
    public function store(Request $request)
    {
        // Controleer eerst of de gebruiker wel is ingelogd
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om een review te plaatsen.');
        }

        // Controleer of de ingevulde gegevens kloppen
        $validated = $request->validate([
            'name' => 'required|string|max:255',       // Naam is verplicht
            'rating' => 'required|integer|min:1|max:5', // Score moet tussen 1 en 5 zijn
            'message' => 'required|string',             // Bericht is verplicht
        ]);

        // Maak de review aan in de database
        Review::create([
            'user_id' => Auth::id(),           // Koppel de review aan de ingelogde gebruiker
            'name' => $validated['name'],      // Gebruik de opgegeven naam
            'rating' => $validated['rating'],  // Gebruik de gekozen sterren
            'message' => $validated['message'],// Gebruik het geschreven bericht
        ]);

        // Ga terug naar de reviewpagina met een succesmelding
        return redirect()->route('reviews')->with('success', 'Bedankt voor je review!');
    }

    /**
     * Verwijder een review uit de database.
     */
    public function destroy(Review $review)
    {
        // Controleer of de ingelogde gebruiker de eigenaar is van de review
        if (Auth::id() !== $review->user_id) {
            return back()->with('error', 'Je kunt alleen je eigen reviews verwijderen.');
        }

        // Verwijder de review
        $review->delete();

        // Ga terug met een succesmelding
        return back()->with('success', 'Je review is verwijderd.');
    }
}
