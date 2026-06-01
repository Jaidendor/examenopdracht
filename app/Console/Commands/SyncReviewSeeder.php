<?php

namespace App\Console\Commands;

use App\Models\Review;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('reviews:sync-seeder')]
#[Description('Exporteer alle reviews uit de database naar ReviewSeeder.php')]
class SyncReviewSeeder extends Command
{
    public function handle(): void
    {
        // Haal alle reviews op uit de database
        $reviews = Review::all(['name', 'rating', 'message']);

        if ($reviews->isEmpty()) {
            $this->warn('Geen reviews gevonden in de database.');
            return;
        }

        // Bouw de PHP array string op voor in de seeder
        $reviewsCode = '';
        foreach ($reviews as $review) {
            // Escape aanhalingstekens zodat PHP er geen fout op geeft
            $name    = addslashes($review->name);
            $message = addslashes($review->message);
            $rating  = $review->rating;

            $reviewsCode .= "            [\n";
            $reviewsCode .= "                'name'    => '{$name}',\n";
            $reviewsCode .= "                'rating'  => {$rating},\n";
            $reviewsCode .= "                'message' => '{$message}',\n";
            $reviewsCode .= "            ],\n";
        }

        // De volledige inhoud van ReviewSeeder.php
        $seederContent = <<<PHP
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
        \$user = User::firstOrCreate(
            ['email' => 'demo@cominbeeld.nl'],
            ['name' => 'Demo Gebruiker', 'password' => bcrypt('password')]
        );

        \$reviews = [
{$reviewsCode}        ];

        foreach (\$reviews as \$data) {
            Review::firstOrCreate(
                ['name' => \$data['name'], 'message' => \$data['message']],
                ['user_id' => \$user->id, 'rating' => \$data['rating']]
            );
        }
    }
}
PHP;

        // Schrijf de nieuwe inhoud naar het seeder bestand
        file_put_contents(database_path('seeders/ReviewSeeder.php'), $seederContent);

        $this->info("✅ ReviewSeeder bijgewerkt met {$reviews->count()} review(s).");
        $this->line('Push naar GitHub zodat Yateen kan draaien: php artisan db:seed --class=ReviewSeeder');
    }
}
