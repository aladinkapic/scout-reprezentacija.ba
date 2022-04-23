<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller{
    protected $_path = 'public.app.';
    public function home(){
        return view($this->_path.'home');
    }
}
