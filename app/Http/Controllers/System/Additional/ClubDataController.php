<?php

namespace App\Http\Controllers\System\Additional;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\Models\Additional\ClubData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubDataController extends Controller{
    protected $_path = 'system.app.additional.clubs-data.';
    public function isOwner($clubDataID){
        try{
            $clubData = ClubData::where('id', $clubDataID)->first();
            if($clubData->user_id == Auth::id() or Auth::user()->role == 0) return $clubData;
        }catch (\Exception $e){}
        return false;
    }
    public function getSeasons(){
        $seasons = [];
        for($i=date('Y'); $i>=1980; $i--) $seasons[($i-1).' / '.$i] = ($i-1).' / '.$i;
        return $seasons;
    }
    public function data($action = 'create', $id = null){
        return view($this->_path.'create', [
            $action => true,
            'clubs' => Club::pluck('title', 'id'),
            'seasons' => $this->getSeasons(),
            'clubData' => isset($id) ? ClubData::find($id) : null
        ]);
    }
    public function create(){ return $this->data(); }
    public function save (Request $request){
        try {
            $request['user_id'] = Auth::id();
            $clubData = ClubData::create($request->except(['_token']));
            return $this::success(route('system.additional.club-data.preview', ['id' => $clubData->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function preview($id){
        return ($this->isOwner($id)) ? $this->data('preview', $id) : redirect()->route('system.users.profile');
    }
    public function edit($id){
        return ($this->isOwner($id)) ? $this->data('edit', $id) : redirect()->route('system.users.profile');
    }
    public function update (Request $request){
        try {
            ClubData::where('id', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this::success(route('system.additional.club-data.preview', ['id' => $request->id]));
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
