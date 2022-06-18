<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Core\Keywords\Keyword;
use App\User;
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
        $users = User::where('role', 1);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'sportRel.value' => __('Sport'),
            'positionRel.value' => __('Pozicija'),
            'height' => __('Visina'),
            'strongerLimbRel.value' => __('Snažnija noga'),
            'genderRel.value' => __('Spol'),
            'natTeamDataRel.title' => __('Državljanstvo'),
            'clubDataRel.title' => __('Klub')
        ];

        return view($this->_path . '.search-results', [
            'filters' => $filters,
            'users' => $users
        ]);
    }
}
