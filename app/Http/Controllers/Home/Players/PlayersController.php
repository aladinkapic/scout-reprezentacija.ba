<?php

namespace App\Http\Controllers\Home\Players;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomepageController;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Additional\Club;
use App\Models\Core\Affiliation;
use App\Models\Core\Keywords\Keyword;
use App\Models\Players\PlayerRate;
use App\User;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    protected $_path = 'public.app.players.';

    public function search(){
        $users = User::where('role', 1);
        $users = Filters::filter($users);

        $positions = Keyword::where('keyword', 'position_futsal')->pluck('value', 'value');

        $noPages  = (($users->total() / 12) === (int)($users->total() / 12)) ? ($users->total() / 12) : ((int)($users->total() / 12) + 1);
        $nextPage = isset($_GET['page']) ? ($_GET['page'] + 1) : 2;
        $nextPage = ($nextPage > $noPages) ? $nextPage = $noPages : $nextPage;

        if(isset(\request()->filter)){
            foreach (\request()->filter as $key => $val){
                if($val == 'sportRel.value'){
                    if(\request()->filter_values[$key] == 'Futsal'){
                        $positions = Keyword::where('keyword', 'position_football')->pluck('value', 'value');
                    }else{
                        $positions = Keyword::where('keyword', 'position_futsal')->pluck('value', 'value');
                    }
                }
            }
        }

        return view($this->_path . 'search-results', [
            'users' => $users,

            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id'),
            'range' => (new HomepageController())->getYearRange(),
            'strongerLimb' =>  Keyword::where('keyword', 'arm_leg')->pluck('value', 'value'),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'value'),
            'positions' => $positions,
            'countries' => Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'title'),
            'clubs' => Club::pluck('title', 'title')->prepend('Odaberite klub', ''),
            'noPages' => $noPages,
            'nextPage' => $nextPage
        ]);
    }
    public function getData($username, $what){
        $player = User::where('username', $username)->first();

        try{
            $mainReview = (int) ( (PlayerRate::where('user_id', $player->id)->sum('rate')) / PlayerRate::where('user_id', $id)->count() );
        }catch (\Exception $e){ $mainReview = 0;}

        return view($this->_path.'preview', [
            'player' => $player,
            'what' => $what,
            'mainReview' => $mainReview
        ]);
    }
    public function preview($username){
        return $this->getData($username, "timeline");
    }
    public function previewInfo($username){
        return $this->getData($username, "info");
    }
}
