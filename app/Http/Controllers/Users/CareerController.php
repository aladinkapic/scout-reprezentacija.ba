<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Additional\ClubData;
use App\Models\Additional\NatTeamData;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller{
    protected $_path = 'public.users.career.';

    protected function getSeason($seasons){
        if(((int)date('m')) < 6) $current = (date('Y') - 1) . ' / ' . date('Y');
        else$current = date('Y') . ' / ' . (date('Y') + 1);

        foreach ($seasons as $key => $val){ if($val == $current) $currentSeason = $key; }

        return $currentSeason;
    }

    public function clubs(){
        return view($this->_path. 'clubs.my-clubs');
    }
    public function newClub (){
        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');

        return view($this->_path. 'clubs.add-club', [
            'seasons' => $seasons,
            'currentSeason' => $this->getSeason($seasons)
        ]);
    }
    public function saveNewClub(Request $request){
        try{
            if(!isset($request->club)){
                return $this->apiError('10201', __('Za unos informacija o klupskoj karijeri, odaberite Vaš klub!'));
            }
            if(!isset($request->season_name) or !isset($request->no_games) or !isset($request->goals) or !isset($request->assistance) or !isset($request->minutes) or !isset($request->red_cards) or !isset($request->yellow_cards)){
                return $this->apiError('10202', __('Molimo popunite sva polja!'));
            }

            $request['user_id'] = Auth::user()->id;
            $request['club_id'] = $request->club;

            $clubData = ClubData::create($request->except(['_token', 'club']));

            return $this::apiSuccess('Uspješno ažurirano', route('profile.career-data.clubs'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
    public function editClubData ($id){
        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');
        $clubData = ClubData::where('id', $id)->first();

        if($clubData->user_id != Auth::user()->id) return redirect()->route('profile.career-data.clubs');

        return view($this->_path. 'clubs.add-club', [
            'seasons' => $seasons,
            'currentSeason' => $this->getSeason($seasons),
            'clubData' => $clubData,
            'edit' => true
        ]);
    }
    public function updateClubData(Request $request){
        try{
            if(!isset($request->club)){
                return $this->apiError('10201', __('Za unos informacija o klupskoj karijeri, odaberite Vaš klub!'));
            }
            if(!isset($request->season_name) or !isset($request->no_games) or !isset($request->goals) or !isset($request->assistance) or !isset($request->minutes) or !isset($request->red_cards) or !isset($request->yellow_cards)){
                return $this->apiError('10202', __('Molimo popunite sva polja!'));
            }

            $clubData = ClubData::where('id', $request->id )->first();
            $request['club_id'] = $request->club;

            if($clubData->user_id != Auth::user()->id) return $this::apiSuccess('Pristup zabranjen!', route('profile.career-data.clubs'));

            $clubData->update($request->except(['_token', 'club']));

            return $this::apiSuccess('Uspješno ažurirano', route('profile.career-data.clubs'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }

    /**
     *  National teams
     */
    public function nationalTeams(){
        return view($this->_path. 'national-teams.my-teams');
    }
    public function newNationalTeam  (){
        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');

        return view($this->_path. 'national-teams.add-national-team', [
            'seasons' => $seasons,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'team' => Keyword::where('keyword', 'nat_team')->pluck('value', 'id'),
            'currentSeason' => $this->getSeason($seasons)
        ]);
    }
    public function saveNewNationalTeam(Request $request){
        try{
            $request['user_id'] = Auth::user()->id;

            $clubData = NatTeamData::create($request->except(['_token']));

            return $this::apiSuccess('Uspješno ažurirano!', route('profile.career-data.national-teams'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
    public function editNationalTeam ($id){
        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');
        $clubData = NatTeamData::where('id', $id)->first();
        if($clubData->user_id != Auth::user()->id) return redirect()->route('profile.career-data.national-teams');

        return view($this->_path. 'national-teams.add-national-team', [
            'seasons' => $seasons,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'team' => Keyword::where('keyword', 'nat_team')->pluck('value', 'id'),
            'currentSeason' => $this->getSeason($seasons),
            'clubData' => $clubData,
            'edit' => true
        ]);
    }
    public function updateNationalTeam(Request $request){
        try{
            $request['user_id'] = Auth::user()->id;

            $clubData = NatTeamData::where('id', $request->id)->first();
            if($clubData->user_id != Auth::user()->id) return $this::apiSuccess('Pristup zabranjen!', route('profile.career-data.national-teams'));

            $clubData->update($request->except(['_token']));

            return $this::apiSuccess('Uspješno ažurirano!', route('profile.career-data.national-teams'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
}
