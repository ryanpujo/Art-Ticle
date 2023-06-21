<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture'
    ];

    public function posts() : HasMany {
        return $this->hasMany(Post::class);
    }

    public function images() : HasMany {
        return $this->hasMany(Image::class);
    }

    public function followers() : BelongsToMany {
        return $this->belongsToMany(User::class, 'following', 'user_id', 'follower_id');
    }

    public function followings() : BelongsToMany {
        return $this->belongsToMany(User::class, 'following', 'follower_id', 'user_id');
    }

    public function followingPosts() {
        return $this->followings()->get(["*"])->map(function (User $user) {
            return $user->posts()->get();
        })->flatMap(function (Collection $posts) {
            return $posts->map(function (Post $post) {
                return new PostUSer(post:$post, user: $post->user()->first());
            });
        })->all();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
