<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Vul de database met gegevens.
     */
    public function run(): void
    {
        // Maak 10 willekeurige gebruikers aan
        // User::factory(10)->create();

        // Maak een specifieke testgebruiker aan
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
    }
}
