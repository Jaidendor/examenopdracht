<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Maak de reviews tabel aan in de database.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Uniek nummer voor de review
            // Koppel de review aan een gebruiker, verwijder reviews als gebruiker verwijderd wordt
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');    // De naam van de reviewer
            $table->integer('rating'); // Het aantal sterren
            $table->text('message');   // De geschreven tekst
            $table->timestamps();      // Houdt bij wanneer de review is geplaatst
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
