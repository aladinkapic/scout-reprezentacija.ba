<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model{
    protected $table = 'posts__likes';
    protected $guarded = ['id'];

    public function postRel(){
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
