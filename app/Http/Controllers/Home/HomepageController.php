<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Core\Affiliation;

class HomepageController extends Controller {
    protected $_path = 'public.app.';

    public function home(){
        $countries = array();

        return view($this->_path.'home', [
            'countries' => $countries
        ]);
    }

    public function register(){
        return view($this->_path.'register', [
            'countries' => Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'id')
        ]);
    }
}
