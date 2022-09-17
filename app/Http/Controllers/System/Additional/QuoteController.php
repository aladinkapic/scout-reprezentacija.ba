<?php

namespace App\Http\Controllers\System\Additional;

use App\Http\Controllers\Controller;
use App\Models\Additional\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller{
    protected $_path = 'system.app.additional.quotes.';

    public function index (){
        $quotes = Quote::get();

        return view($this->_path.'index', [
            'quotes' => $quotes
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

                    $file->move(public_path('/images/quotes/'), $name);
                    Quote::create([
                        'name' => $request->name,
                        'title' => $request->title,
                        'quote' => $request->quote,
                        'image' => $name
                    ]);
                }catch (\Exception $e){dd($e);}
            }

            return redirect()->route('system.additional.quote.index');
        }catch (\Exception $e){ dd($e); return redirect()->back(); }
    }
    public function delete ($id){
        try{
            Quote::find($id)->delete();
            return redirect()->route('system.additional.quote.index');
        }catch (\Exception $e){ return redirect()->back(); }
    }
}
