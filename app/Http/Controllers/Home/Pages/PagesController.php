<?php

namespace App\Http\Controllers\Home\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller{
    protected $_path = 'public.app.pages.';
    public function privacy(){
        return view($this->_path . 'privacy');
    }
    public function terms(){
        return view($this->_path . 'terms ');
    }
    public function cookies(){
        return view($this->_path . 'cookies');
    }
}
