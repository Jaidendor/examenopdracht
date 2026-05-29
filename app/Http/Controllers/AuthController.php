<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Deze controller regelt het inloggen, registreren en uitloggen van gebruikers.
 */
class AuthController extends Controller
{
    /**
     * Toon het login formulier.
     */
    public function showLogin()
    {
        // We sturen de gebruiker naar de login view die al bestaat
        return view('auth.login');
    }

    /**
     * Verwerk het inlogverzoek.
     * Hier gebruiken we PHP en Laravel's ingebouwde Auth (die MySQL gebruikt).
     */
    public function login(Request $request)
    {
        // 1. Valideer de invoer (email en wachtwoord zijn verplicht)
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Probeer in te loggen met de opgegeven gegevens
        // Laravel checkt automatisch in de MySQL 'users' tabel
        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            // Inloggen is gelukt: sessie hergenereren voor veiligheid
            $request->session()->regenerate();

            // Stuur de gebruiker door naar de homepagina (of de bedoelde pagina)
            return redirect()->intended(route('home'));
        }

        // 3. Als inloggen mislukt, stuur terug met een foutmelding
        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens zijn onjuist.',
        ])->onlyInput('email');
    }

    /**
     * Toon het registratieformulier.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Verwerk het registratieverzoek.
     * Maakt een nieuw account aan in de MySQL 'users' tabel.
     */
    public function register(Request $request)
    {
        // 1. Valideer de invoer
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'], // email mag nog niet bestaan
            'password' => ['required', 'min:8', 'confirmed'],          // confirmed = moet overeenkomen met password_confirmation
        ]);

        // 2. Maak de nieuwe gebruiker aan in de database
        // Het wachtwoord wordt automatisch gehasht door het User model (zie casts)
        $user = User::create($validated);

        // 3. Log de nieuwe gebruiker direct in
        Auth::login($user);

        // 4. Stuur door naar de homepagina
        return redirect()->route('home');
    }

    /**
     * Log de gebruiker uit.
     */
    public function logout(Request $request)
    {
        // Log de gebruiker uit de sessie
        Auth::logout();

        // Maak de huidige sessie ongeldig
        $request->session()->invalidate();

        // Genereer een nieuw CSRF token
        $request->session()->regenerateToken();

        // Stuur terug naar de homepagina
        return redirect('/');
    }
}
