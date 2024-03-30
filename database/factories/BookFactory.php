<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $genre = Genre::factory()->create();
       $author = Author::factory()->create();
        return [
            'title' => $this->faker->sentence(3), 
            'genre_id' => $genre->id,
            'author_id' => $author->id,
            'description' => $this->faker->paragraph(), 
            'ISBN' => $this->faker->unique()->isbn10, 
            'edition' => $this->faker->numberBetween(1, 10),
            'publicationDate' => $this->faker->date(), 
            'pagesNumber' => $this->faker->numberBetween(50, 500), 
            'quantity' => $this->faker->numberBetween(1, 100), 
            'language' => $this->faker->languageCode(), 
        ];
    }
}
