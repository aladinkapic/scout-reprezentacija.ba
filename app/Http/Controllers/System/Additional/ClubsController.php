<?php

namespace App\Http\Controllers\System\Additional;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\Models\Core\Affiliation;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Http\Request;

class ClubsController extends Controller{
    protected $_path = 'system.app.additional.clubs.';

    public function index(){
        return view($this->_path.'index');
    }
    public function data($action = 'create', $id = null){
        return view($this->_path.'create', [
            'countries' => Affiliation::where('keyword', 'D')->pluck('title', 'id')->prepend('Odaberite državu', ''),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id'),
            $action => true,
            'club' => isset($id) ? Club::find($id) : null
        ]);
    }
    public function create(){return $this->data();}
    public function save (Request $request){
        try {
            $club = Club::create($request->all());
            return $this::success(route('system.additional.clubs.preview', ['id' => $club->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function preview($id){ return $this->data('preview', $id); }
    public function edit($id){ return $this->data('edit', $id); }
    public function update (Request $request){
        try {
            Club::where('id', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this::success(route('system.additional.clubs.preview', ['id' => $request->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
}
