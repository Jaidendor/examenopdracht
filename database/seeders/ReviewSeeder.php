<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * ReviewSeeder — automatisch gegenereerd via: php artisan reviews:sync-seeder
 *
 * Gebruik: php artisan db:seed --class=ReviewSeeder
 */
class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'demo@cominbeeld.nl'],
            ['name' => 'Demo Gebruiker', 'password' => bcrypt('password')]
        );

        $reviews = [
            [
                'name'    => 'Anna de Vries',
                'rating'  => 5,
                'message' => 'Geweldige app! Mijn dochter kan zich nu veel beter uiten. Aanrader!',
            ],
            [
                'name'    => 'Mark Jansen',
                'rating'  => 4,
                'message' => 'Heel gebruiksvriendelijk. Zelfs wij als ouders konden het snel instellen.',
            ],
            [
                'name'    => 'Sara Bakker',
                'rating'  => 5,
                'message' => 'Top product! We zijn erg blij met de resultaten na 2 weken.',
            ],
            [
                'name'    => 'Test User',
                'rating'  => 5,
                'message' => 'test',
            ],
        ];

        foreach ($reviews as $data) {
            Review::firstOrCreate(
                ['name' => $data['name'], 'message' => $data['message']],
                ['user_id' => $user->id, 'rating' => $data['rating']]
            );
        }
    }
}