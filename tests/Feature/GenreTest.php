<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Genre;
use App\Models\User;

class GenreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    
    public function testGenreCanBeCreated()
    {

 
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($user);

        $response = $this->post('/dashboard/genres', [
            'name' => 'fiction'
        ]);

        $response->assertStatus(200);
    }
      

    public function testGenreCanBeUpdated()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);   
        $this->actingAs($user);    
        $Genre = Genre::factory()->create();
        $response = $this->put('/dashboard/genres/'.$Genre->id , [
            'name' => 'fiction',
        ]);

        $response->assertStatus(200);
    }
    public function testGenreCanBeDeleted()
    {
        
        $user = User::factory()->create([
            'role' => 'admin',
        ]);   
        $this->actingAs($user);    
        $Genre = Genre::factory()->create();
        $response = $this->delete('/dashboard/genres/'.$Genre->id , );
        $response->assertStatus(200);
    }
}
