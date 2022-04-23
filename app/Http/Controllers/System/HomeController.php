<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller{
    protected $_path = 'system.app.';

    public function home(){
        return view($this->_path.'dashboard', [

        ]);
    }
}
