<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * De UserFactory wordt gebruikt om nep-gebruikers aan te maken voor testen.
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Het huidige wachtwoord dat door de factory wordt gebruikt.
     */
    protected static ?string $password;

    /**
     * Definieer de standaard staat van het model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Geef aan dat het e-mailadres van de gebruiker niet geverifieerd is.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
