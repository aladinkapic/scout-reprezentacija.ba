<?php

namespace App\Http\Controllers\API\Players;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\Models\Blog\BlogPosts;
use App\Models\Players\PlayerRate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    /*
     *  Rate player; Allowed every 7 days !
     */
    public function saveRate(Request $request){
        try{
            return PlayerRate::create(['user_id' => $request->id, 'ip' => $this::getIP(), 'rate' => $request->index]);
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
    public function getImage(Request $request){
        try{
            $post = BlogPosts::find($request->id);

            $owner = ($post->category == 0) ? User::find($post->owner)->name : Club::find($post->owner)->title;

            $next = BlogPosts::where('id', '<', $post->id)->where('image', '!=', '')->where('owner', $post->owner)->orderBy('id', 'DESC')->first();
            $previous = BlogPosts::where('id', '>', $post->id)->where('image', '!=', '')->where('owner', $post->owner)->orderBy('id', 'ASC')->first();

            return $this::success("", [
                'post' => $post,
                'owner' => $owner,
                'date' => $post->createdAt(),
                'next' => $next->id ?? '',
                'previous' => $previous->id ?? ''
            ]);
        }catch (\Exception $e){dd($e);}
    }
}
