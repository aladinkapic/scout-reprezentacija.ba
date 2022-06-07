<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Core\Keywords\Keyword;
use Illuminate\Http\Request;
use App\Models\Core\Affiliation;
use App\Models\Additional\Club;

class HomepageController extends Controller {
    protected $_path = 'public.app.';

    public function home(){

        return view($this->_path.'home', [
            'countries' => Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'id')->prepend('Odaberite državu', ''),
            'clubs' => Club::pluck('title', 'id')->prepend('Odaberite klub', '')->prepend('Odaberite klub', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
        ]);
    }

    public function register(){
        return view($this->_path.'register', [
            'countries' => Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'id')->prepend('Odaberite državu', ''),            
            'clubs' => Club::pluck('title', 'id')->prepend('Odaberite klub', '')->prepend('Odaberite klub', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite državu', ''),
        ]);
    }

    public function searchResults(){
        return view($this->_path.'search-results');
    }
}
