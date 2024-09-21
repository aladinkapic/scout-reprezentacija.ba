<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller{
    protected $_path = 'public.users.posts.';

    public function posts(){

        return view($this->_path . 'posts');
    }
}
