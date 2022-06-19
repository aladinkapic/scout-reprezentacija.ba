<?php

namespace App\Http\Controllers\System\Additional;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Additional\Partner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PartnersController extends Controller{
    protected $_path = 'system.app.additional.partners.';

    public function index (){
        $partners = Partner::get();

        return view($this->_path.'index', [
            'partners' => $partners
        ]);
    }
    public function create(){
        return view($this->_path.'create');
    }
    public function save (Request $request){
        try{
            if($request->has('image')){
                try{
                    $file = $request->file('image');
                    $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                    $name = md5($file->getClientOriginalName().time()).'.'.$ext;

                    $file->move(public_path('/images/partners/'), $name);
                    Partner::create([
                        'link' => $request->link,
                        'image' => $name
                    ]);
                }catch (\Exception $e){dd($e);}
            }

            return redirect()->route('system.additional.partners.index');
        }catch (\Exception $e){ return redirect()->back(); }
    }
    public function delete ($id){
        try{
            Partner::find($id)->delete();
            return redirect()->route('system.additional.partners.index');
        }catch (\Exception $e){ return redirect()->back(); }
    }
}
