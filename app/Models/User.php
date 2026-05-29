<?php
/**
 * Dit model vertegenwoordigt een gebruiker in de applicatie.
 * Het regelt de interactie met de 'users' tabel in de database.
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * De User class breidt Authenticatable uit, wat betekent dat
 * dit model gebruikt kan worden voor het inlogsysteem van Laravel.
 */
#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Hier definiëren we hoe bepaalde databasevelden moeten worden behandeld.
     * Bijvoorbeeld: het wachtwoord moet altijd gehasht worden opgeslagen.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Een gebruiker kan meerdere reviews hebben geschreven.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
