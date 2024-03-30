<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function _example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function BookCanBeCreated()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($user);
        $genre = Genre::factory()->create();
        $author = Author::factory()->create();
        $response = $this->post('/dashboard/books',[
            'title' =>'name book', 
            'genre_id' => $genre->id,
            'author_id' => $author->id,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, dolorem excepturi aspernatur officia optio illum ex, quibusdam rem laborum neque eum quasi temporibus molestias tempora ab blanditiis minus iusto aut?', 
            'ISBN' => '1234567890', 
            'edition' => '2020',
            'publicationDate' => '09-12-2020', 
            'pagesNumber' => '290', 
            'quantity' => '190', 
            'language' => 'english', 
        ]);
        $response->assertStatus(302);
    }

}
