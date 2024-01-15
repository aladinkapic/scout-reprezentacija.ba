<?php

namespace App\Http\Controllers\System\Additional;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\Models\Additional\ClubData;
use App\Models\Additional\NatTeamData;
use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NatTeamDataController extends Controller{
    protected $_path = 'system.app.additional.nationality-team.';
    public function isOwner($clubDataID){
        try{
            $clubData = NatTeamData::where('id', $clubDataID)->first();
            if($clubData->user_id == Auth::id() or Auth::user()->role == 0) return $clubData;
        }catch (\Exception $e){}
        return false;
    }
    public function getSeasons(){
        $seasons = [];
        for($i=date('Y'); $i>=1980; $i--) $seasons[($i-1).' / '.$i] = ($i-1).' / '.$i;
        return $seasons;
    }
    public function data($user_id, $action = 'create', $natData = null){
        return view($this->_path.'create', [
            'user' => User::where('id', $user_id)->first(),
            $action => true,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'team' => Keyword::where('keyword', 'nat_team')->pluck('value', 'id'),
            'seasons' => Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id'),
            'clubData' => $natData
        ]);
    }
    public function create(){  return $this->data(Auth::user()->id); }
    public function createFor ($id){
        return view($this->_path.'create', [
            'user' => User::where('id', $id)->first(),
            'create' => true,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'team' => Keyword::where('keyword', 'nat_team')->pluck('value', 'id'),
            'seasons' => Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id'),
            'clubData' => null
        ]);
    }
    public function save (Request $request){
        try {
            // $request['user_id'] = Auth::id();
            $clubData = NatTeamData::create($request->except(['_token']));
            return $this::success(route('system.additional.nat-team-data.preview', ['id' => $clubData->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function preview($id){
        $clubData = NatTeamData::where('id', $id)->first();
        $user_id  = ($clubData->user_id != Auth::user()->id) ? $clubData->user_id : Auth::user()->id;

        return ($this->isOwner($id)) ? $this->data($user_id, 'preview', $clubData) : redirect()->route('system.users.profile');
    }
    public function edit($id){
        $clubData = NatTeamData::where('id', $id)->first();
        $user_id  = ($clubData->user_id != Auth::user()->id) ? $clubData->user_id : Auth::user()->id;

        return ($this->isOwner($id)) ? $this->data($user_id, 'edit', $clubData) : redirect()->route('system.users.profile');
    }
    public function update (Request $request){
        try {
            NatTeamData::where('id', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this::success(route('system.additional.nat-team-data.preview', ['id' => $request->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function delete($id){
        try{
            $clubData = $this->isOwner($id);
            if($clubData) $clubData->delete();
        }catch (\Exception $e){}
        return redirect()->route('system.users.profile');
    }
}
