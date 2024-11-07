<?php

namespace App\Http\Controllers\Home\Players;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomepageController;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Additional\Club;
use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Models\Players\PlayerRate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PlayersController extends Controller{
    protected $_path = 'public.app.players.';

    protected function checkForFilter($filterKey): bool{
        if(isset(\request()->filter)){
            foreach (\request()->filter as $key => $val){
                if($key == $filterKey) return true;
            }
        }
        return false;
    }
    public function search(){
        if($this->checkForFilter('name')){
            $users = User::where('role', 1)->where('active', 1)->orderBy('name');
        }else{
            $users = User::where('role', 1)->where('active', 1)->inRandomOrder();
        }
        $users = Filters::filter($users);

        // $positions = Keyword::where('keyword', 'position_football')->pluck('value', 'value');
        $positions = Keyword::where('keyword', 'position_football')->pluck('value', 'value');

        $noPages  = (($users->total() / Filters::getLimit()) === (int)($users->total() / Filters::getLimit())) ? ($users->total() / Filters::getLimit()) : ((int)($users->total() / Filters::getLimit()) + 1);
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        $nextPage = isset($_GET['page']) ? ($_GET['page'] + 1) : 2;
        $nextPage = ($nextPage > $noPages) ? $nextPage = $noPages : $nextPage;

        if(isset(\request()->filter)){
            foreach (\request()->filter as $key => $val){
                if($val == 'sportRel.value'){
                    if(\request()->filter_values[$key] == 'Futsal'){
                        $positions = Keyword::where('keyword', 'position_futsal')->pluck('value', 'value');
                    }else{
                        $positions = Keyword::where('keyword', 'position_football')->pluck('value', 'value');
                    }
                }
            }
        }

        if(App::getLocale() == 'bs'){
            $countries = Country::orderBy('name_ba')->pluck('name_ba', 'name_ba')->prepend(__('Odaberite državu'), '');
        }else{
            $countries = Country::orderBy('name_ba')->pluck('name', 'name_ba')->prepend(__('Odaberite državu'), '');
        }

        return view($this->_path . 'search-results', [
            'users' => $users,

            'sports' => $this->translateKeywords(Keyword::where('keyword', 'sport')->pluck('value', 'value')),
            'range' => (new HomepageController())->getYearRange(),
            'strongerLimb' =>  $this->translateKeywords(Keyword::where('keyword', 'arm_leg')->pluck('value', 'value')),
            'gender' => $this->translateKeywords(Keyword::where('keyword', 'gender')->pluck('value', 'value')),
            'positions' => $positions,
            'countries' => $countries,
            'clubs' => Club::pluck('title', 'title')->prepend('Odaberite klub', ''),
            'noPages' => $noPages,
            'nextPage' => $nextPage,
            'currentPage' => $currentPage
        ]);
    }
    public function getData($username, $what){
        $player = User::where('username', $username)->first();
        /* Init empty api data var */
        $apiData = []; $length = 0;

        /* Special players, do not allow timeline; Force redirect */
        if($what == 'timeline' and $player->from_api == 1) return redirect()->route('home.players.player-info', ['username' => $player->username] );

        try{
            $mainReview = (int) ( (PlayerRate::where('user_id', $player->id)->sum('rate')) / PlayerRate::where('user_id', $player->id)->count() );
        }catch (\Exception $e){ $mainReview = 0;}

        // if($player->from_api == 1){ }
        /**
         *  Allow news for regular users
         */
        try{
            /* Check for news about player */
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://reprezentacija.ba/wp-json/repka/v1/posts?tag_slug=' . $player->username);
            $apiData  = json_decode($response->getBody()->getContents());

            $length = count($apiData);
        }catch (\Exception $e){
            $length = 0;
        }

        return view($this->_path.'preview', [
            'player' => $player,
            'what' => $what,
            'mainReview' => $mainReview,
            'apiData' => $apiData,
            'length' => (count($apiData) >= 6) ? 6 : $length
        ]);
    }
    public function preview($username){
        return $this->getData($username, "timeline");
    }
    public function previewInfo($username){
        return $this->getData($username, "info");
    }
}
