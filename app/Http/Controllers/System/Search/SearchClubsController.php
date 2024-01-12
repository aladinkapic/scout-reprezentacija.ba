<?php

namespace App\Http\Controllers\System\Search;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use Illuminate\Http\Request;

class SearchClubsController extends Controller{
    public function byName(Request $request){
        try{
            $clubs = Club::where('title', 'like', '%' . ($request->term['term']) . '%')->with('countryRel')->get();

            // dd($clubs);

            return json_encode($clubs);

            dd($clubs);
        }catch (\Exception $e){}


    }
}
