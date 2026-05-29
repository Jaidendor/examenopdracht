<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Voer de migratie uit om de tabellen aan te maken.
     * Dit script maakt de 'users', 'password_reset_tokens' en 'sessions' tabellen.
     */
    public function up(): void
    {
        // De tabel voor gebruikersgegevens
        Schema::create('users', function (Blueprint $table) {
            $table->id();                               // Uniek ID
            $table->string('name');                     // Naam van de gebruiker
            $table->string('email')->unique();          // E-mailadres (moet uniek zijn)
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');                 // Gehasht wachtwoord
            $table->rememberToken();                    // Voor de "onthoud mij" functionaliteit
            $table->timestamps();                       // Houdt 'created_at' en 'updated_at' bij
        });

        // Tabel voor wachtwoord herstel tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabel om inlogsessies van gebruikers in de database op te slaan
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Maak de migratie ongedaan (verwijder de tabellen).
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
