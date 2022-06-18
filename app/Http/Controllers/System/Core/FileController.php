<?php

namespace App\Http\Controllers\System\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller{
    /*
     *  This functions are used to store content to .txt files and read back data to it
     */
    public static function stringToTxt(Request $request){
        try{
            $postTitle = md5(Auth::id().time()).'.txt';
            Storage::put('posts/'.$postTitle, $request->summernoteDesc);
            return $postTitle;
        }catch (\Exception $e){ return 0; }
    }
}
