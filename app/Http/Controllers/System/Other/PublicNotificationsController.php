<?php

namespace App\Http\Controllers\System\Other;

use App\Http\Controllers\Controller;
use App\Models\Additional\Quote;
use App\Models\Other\PublicNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicNotificationsController extends Controller{
    protected $_path = 'system.app.other.pn.';

    public function index (){
        $quotes = Quote::get();

        return view($this->_path.'index', [
            'quotes' => $quotes,
            'pns' => PublicNotification::get()
        ]);
    }
    public function create(){
        return view($this->_path.'create');
    }
    public function save (Request $request){
        try{
            $request['from'] = Carbon::parse($request->from)->format('Y-m-d');
            $request['to']   = Carbon::parse($request->to)->format('Y-m-d');

            $pn = PublicNotification::create($request->all());
            return $this::success(route('system.other.public-notifications.preview', ['id' => $pn->id]));

        }catch (\Exception $e){  }
    }
    public function preview($id){
        return view($this->_path.'create', [
            'pn' => PublicNotification::where('id', $id)->first(),
            'preview' => true
        ]);
    }
    public function edit($id){
        return view($this->_path.'create', [
            'pn' => PublicNotification::where('id', $id)->first(),
            'edit' => true
        ]);
    }
    public function update (Request $request){
        try{
            $request['from'] = Carbon::parse($request->from)->format('Y-m-d');
            $request['to']   = Carbon::parse($request->to)->format('Y-m-d');

            PublicNotification::where('id', $request->id)->update($request->except(['_token', 'id', '_method']));
            return $this::success(route('system.other.public-notifications.preview', ['id' => $request->id]));

        }catch (\Exception $e){ dd($e); }
    }
    public function delete ($id){
        try{
            PublicNotification::where('id', $id)->delete();
            return redirect()->route('system.other.public-notifications.index');
        }catch (\Exception $e){ return redirect()->back(); }
    }
}
