<?php

namespace App\Http\Controllers\API\Players;

use App\Http\Controllers\Controller;
use App\Models\Players\PlayerRate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    /*
     *  Rate player; Allowed every 7 days !
     */
    public function saveRate(Request $request){
        try{
            return PlayerRate::create(['user_id' => $request->id, 'ip' => $this::getIP(), 'rate' => $request->index * 2]);
        }catch (\Exception $e){ return false; }
    }
    public function getRate(Request $request){
        try{
            return (int) ( (PlayerRate::where('user_id', $request->id)->sum('rate')) / PlayerRate::where('user_id', $request->id)->count() ) ;
        }catch (\Exception $e){ return 0; }
    }
    public function rate(Request $request){
        try{
            $rate = PlayerRate::where('user_id', $request->id)->where('ip', $this::getIP())->orderBy('id', 'DESC')->first();
            if($rate){
                $date = Carbon::parse($rate->created_at);
                $now = Carbon::now();
                if($date->diffInDays($now) > 7) $rate = $this->saveRate($request);
            }else{
                $rate = $this->saveRate($request);
            }

            $average = $this->getRate($request);

            return $this::success("", [
                'average' => $average,
                'total' => PlayerRate::where('user_id', $request->id)->count()
            ]);
        }catch (\Exception $e){ return $this::error('8001', $e->getMessage()); }
    }
}
