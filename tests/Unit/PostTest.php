<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_database() {
        $this->assertDatabaseCount("posts", 50);
    }

    public function test_user() {
        $post =Post::all()->first();
        $user = $post->user();
        $this->assertInstanceOf(User::class, $user->first());
    }
}
