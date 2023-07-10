<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ApiPostTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     use RefreshDatabase, WithFaker;

    public function test_post()
    {
        $user=User::factory()->create();

        $response = $this->get('/api/user/posts');
        $response->assertStatus(200);
    }

    public function test_addpost()
    {
        $user=User::factory()->create();


        $category=Category::factory()->create();

        $response = $this->post( 'api/user/posts', [
            "title"=> "Quia sed repellat neque.",
            "content"=> "Voluptatem nam ipsum ipsa consequatur sit.",
            "image"=> "https://via.placeholder.com/640x480.png/00cc99?text=culpa",
            "user_id"=> $user->id,
            "category_id"=> $category->id
        ]);

        $response->assertStatus(201);

        
    }

    public function test_updatepost()
    {
        $user=User::factory()->create();
        $category=Category::factory()->create();

        $response = $this->patch( 'api/user/posts/'. $category->id, [
            "title"=> "Quia sed new",
            "content"=> "Voluptatem nam ipsum ipsa consequatur sit.",
            "image"=> "https://via.placeholder.com/640x480.png/00cc99?text=culpa",
            "user_id"=> $user->id,
            "category_id"=> $category->id
        ]);

        $response->assertStatus(202);
    }

    public function test_detailpost()
    {
        $user=User::factory()->create();

        $response = $this->get('api/user/posts/1');

        $response->assertStatus(200);
    }

    public function test_deletepost()
    {
        $user=User::factory()->create();

        $response = $this->delete( 'api/user/posts/1');

        $response->assertStatus(204);
    }
}
