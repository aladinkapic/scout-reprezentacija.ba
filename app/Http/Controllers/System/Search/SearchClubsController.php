<?php

namespace App\Http\Controllers\System\Search;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchClubsController extends Controller{

    public function byName(Request $request){
        try{
            $clubs = Club::where('title', 'like', '%' . ($request->term['term']) . '%')->with('countryRel')->get();
            return json_encode($clubs);
        }catch (\Exception $e){}
    }

    public function byNameV2(Request $request) {
        try{
            return $this::apiSuccess(__('Success'), '', [
                'data' => Club::where('title', 'like', '%' . ($request->term) . '%')->with('countryRel')->take(20)->get()
            ]);
        }catch (\Exception $e){}
    }
}
