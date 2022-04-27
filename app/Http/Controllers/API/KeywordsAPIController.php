<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        }catch (\Exception $e){ return $this::error('8001', $e->getMessage(), 'grska'); }

    }

}
