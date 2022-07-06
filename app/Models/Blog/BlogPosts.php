<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPosts extends Model{
    use SoftDeletes;

    protected $table = 'blog_posts';
    protected $guarded = ['id'];

}
