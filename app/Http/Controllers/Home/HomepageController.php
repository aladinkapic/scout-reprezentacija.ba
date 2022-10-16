<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Additional\Partner;
use App\Models\Additional\Quote;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Http\Request;
use App\Models\Core\Affiliation;
use App\Models\Additional\Club;

class HomepageController extends Controller {
    protected $_path = 'public.app.';

    public function getYearRange(){
        $array = [];
        for($i = date('Y'); $i > 1970; $i--) $array[$i] = $i;
        return $array;
    }

    public function home(){

        return view($this->_path.'home', [
            'countries' => Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'title')->prepend('Odaberite državu', ''),
            'clubs' => Club::pluck('title', 'title')->prepend('Odaberite klub', '')->prepend('Odaberite klub', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'value')->prepend('Odaberite sport', ''),
            'positions' => Keyword::where('keyword', 'position_football')->pluck('value', 'value')->prepend('Odaberite poziciju', ''),
            'strongerLimb' =>  Keyword::where('keyword', 'arm_leg')->pluck('value', 'value')->prepend('Odaberite', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'value')->prepend('Odaberite spol', ''),

            'partners' => Partner::get(),
            'range' => $this->getYearRange(),
            'quotes' => Quote::inRandomOrder()->get()->take(2)
        ]);
    }

    public function register(){

        $countries = Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'id');

        return view($this->_path.'register', [
            'countries' => $countries,
            'clubs' => Club::pluck('title', 'id')->prepend('Odaberite klub', '')->prepend('Odaberite klub', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'citizenship' => $countries
        ]);
    }

    public function searchResults(){

    }
}
