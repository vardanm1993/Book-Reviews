<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws RandomException
     */
    public function run(): void
    {
        Book::factory(50)->create()->each(function ($book) {
            $numOfReviews = random_int(5, 20);

            Review::factory()->count($numOfReviews)
                ->good()
                ->for($book)
                ->create();
        });

        Book::factory(50)->create()->each(function ($book) {
            $numOfReviews = random_int(5, 20);

            Review::factory()->count($numOfReviews)
                ->average()
                ->for($book)
                ->create();
        });

        Book::factory(50)->create()->each(function ($book) {
            $numOfReviews = random_int(5, 20);

            Review::factory()->count($numOfReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}
