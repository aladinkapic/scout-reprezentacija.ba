<?php

namespace App\Http\Controllers\Home\Players;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    protected $_path = 'public.app.players.';

    public function preview(){
        return view($this->_path.'preview');
    }
}
