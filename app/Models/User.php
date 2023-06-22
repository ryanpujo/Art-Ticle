<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
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


    public function scopeFollowingPost(Builder $query, int $id) : Builder {
        global $select;
        return $query->from('following')->where('follower_id', '=', $id)->join('users', 'users.id', '=', 'following.user_id')
        ->join('posts', 'posts.user_id', '=', 'users.id')
        ->select(['users.id as userId', 'name', 'email', 'profile_picture as profilePic', 'posts.id as postId', 'title', 'content', 'posts.created_at as createdAt'])
        ->orderByDesc('posts.created_at');
    }

    public function scopeSelfPost(Builder $query, int $id) : Builder {
        global $select;
        return $query->from('users')->where('users.id', '=', $id)->join('posts', 'posts.user_id', '=', 'users.id')
        ->select(['users.id as userId', 'name', 'email', 'profile_picture as profilePic', 'posts.id as postId', 'title', 'content', 'posts.created_at as createdAt'])
        ->orderByDesc('posts.created_at');
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
