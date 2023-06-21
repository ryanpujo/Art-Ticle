<?php

namespace Tests\Unit;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase; 
use Illuminate\Foundation\Testing\DatabaseTransactions;



class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */

     use RefreshDatabase;

    public function test_example(): void
    {
        $this->assertTrue(true);
    }



    public function test_database() {
        $this->assertDatabaseCount("users", 50);
        $this->assertDatabaseCount("images", 50);
    }

    public function test_find_all() {
        $users = User::all()->toArray();

        $this->assertNotNull($users);
        $this->assertCount(50, $users);
    }

    public function test_posts() {
      $user = User::all()->first();
      $posts = $user->posts();
      $this->assertInstanceOf(Post::class, $posts->first());
      $this->assertNotCount(0, $posts->get()->toArray());
    }

    public function test_images() {
      $user = User::all()->first();
      $images = $user->images();
      $this->assertInstanceOf(Image::class, $images->first());
      $this->assertNotCount(0, $images->get()->toArray());
    }
}
