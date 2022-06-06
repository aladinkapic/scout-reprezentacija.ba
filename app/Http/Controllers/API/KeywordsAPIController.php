<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Core\Affiliation;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KeywordsAPIController extends Controller{
    protected $_path = 'auth.';

    public function getKeyword(Request $request){
        if (empty($request->username)){
            return $this::error('', 'username missin');
        }
        elseif (empty($request->password)){
            return $this::error('', 'pw missin');
        }
        elseif (empty($request->keyword)){
            return $this::error('', 'keyword missin');
        }
        try{
            $keyword = Keyword::select('id', 'value', 'description')->where('keyword', $request->keyword)->orderBy('value', 'desc')->get();

            return $this::success($keyword, '');
        }catch (\Exception $e){ return $this::error('8001', $e->getMessage()); }

    }
    public function getCountries(Request $request){
        try{
            return $this::apiSuccess(__('Zahtjev zaprimljen!'), '', Affiliation::where('keyword', 'D')->orderBy('title')->pluck('title', 'id'));
        }catch (\Exception $e){ return $this::apiSuccess('5000', __('Desila se greška, molimo kontaktirajte administratore!'), '');}
    }
    public function getPositions(Request $request){
        try{
            if($request->value == 3) $data = Keyword::where('keyword', 'position_football')->pluck('value', 'id');
            else if($request->value == 4) $data = Keyword::where('keyword', 'position_futsal')->pluck('value', 'id');

            return $this::apiSuccess(__(''), '', $data);
        }catch (\Exception $e){ return $this::apiSuccess('5000', __('Desila se greška, molimo kontaktirajte administratore!'), '');}
    }
}
