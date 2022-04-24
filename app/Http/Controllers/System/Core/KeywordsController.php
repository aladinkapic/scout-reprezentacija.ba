<?php

namespace App\Http\Controllers\System\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Keywords\Keyword;
use Illuminate\Http\Request;

class KeywordsController extends Controller{
    protected $_path = 'system.app.core.keywords.';
    protected $_keywords = [
        'yes_no' => 'Da ili Ne',
        'category' => 'Kategorija akaunta',
        'citizenship' => 'Državljanstvo',
        'sport' => 'Sportovi',
        'position' => 'Pozicija',
        'arm_leg' => 'Jača ruka/noga'
    ];

    public function index(){
        return view($this->_path.'all-keywords', [
            'keywords' => $this->_keywords
        ]);
    }
    public function preview($key){
        return view($this->_path.'preview', [
            'keywords' => Keyword::where('keyword', $key)->get(),
            'keyword' => $this->_keywords[$key],
            'key' => $key
        ]);
    }
    public function create($key){
        return view($this->_path.'create', [
            'keyword' => $this->_keywords[$key],
            'key' => $key
        ]);
    }
    public function save(Request $request){
        try{
            $keyword = Keyword::create($request->except(['_token']));

//            return $this::success(route('system.settings.core.keywords.edit', ['id' => $keyword->id]));
            return $this::success(route('system.settings.core.keywords.create', [
                'keyword' => $request->keyword,
            ]));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function edit($id){
        $kwrd = Keyword::find($id);

        return view($this->_path.'create', [
            'keyword' => $this->_keywords[$kwrd->keyword],
            'key' => $kwrd->keyword,
            'kwrd' => $kwrd,
            'edit' => true
        ]);
    }
    public function update(Request $request){
        try{
            Keyword::where('id', $request->id)->update([
                'value' => $request->value,
                'description' => $request->description
            ]);

            return $this::success(route('system.settings.core.keywords.edit', ['id' => $request->id]));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function delete(Request $request){
        try{
            $keyword = Keyword::where('id', $request->id)->first();

            $key     = $keyword->keyword;

            $keyword->delete();
            return $this::success(route('system.settings.core.keywords.preview', ['keyword' => $key]));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
}
