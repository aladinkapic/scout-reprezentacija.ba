<?php

namespace App\Http\Controllers\Home\Players;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\User;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    protected $_path = 'public.app.players.';

    public function search(){
        $users = User::where('role', 1);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'sportRel.value' => __('Sport'),
            'positionRel.value' => __('Pozicija'),
            'height' => __('Visina'),
            'years_old' => __('Starost'),
            'strongerLimbRel.value' => __('Snažnija noga'),
            'genderRel.value' => __('Spol'),
            'under_contract' => __('Pod ugovorom'),
            'natTeamDataRel.countryRel.title' => __('Državljanstvo'),
            'clubDataRel.clubRel.title' => __('Klub')
        ];

        return view($this->_path . 'search-results', [
            'filters' => $filters,
            'users' => $users
        ]);
    }
    public function preview($id, $what = 'info'){
        return view($this->_path.'preview', [
            'player' => User::find($id),
            'what' => $what
        ]);
    }
}
