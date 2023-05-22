<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'bidAmount'
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
