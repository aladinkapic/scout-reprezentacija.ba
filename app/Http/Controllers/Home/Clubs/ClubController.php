<?php

namespace App\Http\Controllers\Home\Clubs;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use Illuminate\Http\Request;

class ClubController extends Controller{
    protected $_path = 'public.app.clubs.';

    public function preview($id){
        return view($this->_path.'preview', [
            'club' => Club::find($id)
        ]);
    }
}
