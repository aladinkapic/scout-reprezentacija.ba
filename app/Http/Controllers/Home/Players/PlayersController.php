<?php

namespace App\Http\Controllers\Home\Players;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    protected $_path = 'public.app.players.';

    public function preview($id, $what = 'info'){
        return view($this->_path.'preview', [
            'player' => User::find($id),
            'what' => $what
        ]);
    }
}
