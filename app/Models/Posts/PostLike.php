<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model{
    protected $table = 'posts__likes';
    protected $guarded = ['id'];
}
