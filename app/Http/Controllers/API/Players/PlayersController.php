<?php

namespace App\Http\Controllers\API\Players;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\Models\Blog\BlogPosts;
use App\Models\Players\PlayerRate;
use App\Models\Posts\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlayersController extends Controller{
    protected $_total_players = 5;

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

            $next = BlogPosts::where('id', '<', $post->id)->where('file', '!=', '')->where('owner', $post->owner)->orderBy('id', 'DESC')->first();
            $previous = BlogPosts::where('id', '>', $post->id)->where('file', '!=', '')->where('owner', $post->owner)->orderBy('id', 'ASC')->first();

            return $this::success("", [
                'post' => $post,
                'owner' => $owner,
                'date' => $post->createdAt(),
                'next' => $next->id ?? '',
                'previous' => $previous->id ?? ''
            ]);
        }catch (\Exception $e){dd($e);}
    }

    /**
     *  Get last active users from DB
     */
    public function lastActivePlayers(Request $request){
        try{
            $total = isset($request->total) ? $request->total : 5;

            return response()->json([
                'code' => '0000',
                'data' => [
                    'players' => User::with(
                        'lastClub:user_id,season,season_name,club_id',
                        'lastClub.clubRel:id,title,image,year,city,country',
                        'lastClub.clubRel.countryRel:id,name,name_ba,flag'
                    )->where('from_api', 0)->orderBy('last_activity', 'DESC')->take($total)->get(['id', 'name', 'username', 'image', 'birth_year', 'years_old']),
                    'total' => $total,
                    'message' => __('Success')
                ]
            ]);
        }catch (\Exception $e){
            return response()->json(['code' => '20000', 'message' => __('Desila se greška!')]);
        }
    }

    public function fetchRandomPlayers(Request $request): JsonResponse{
        try{
            if(isset($request->total_players)){
                if($request->total_players < 20) $this->_total_players = $request->total_players;
                else $this->_total_players = 20;
            }

            $players = User::where('active', "=", 1)->where('role', '=', 1)->has('lastClub.clubRel');
            if(isset($request->from_api)) $players = $players->where('from_api', '=', $request->from_api);

            $players = $players->inRandomOrder()->take($this->_total_players)->with('positionRel:id,value', 'genderRel:id,value', 'citizenshipRel:id,name_ba,short_ba,flag,code,fifa_code',  'lastClub:id,club_id,user_id', 'lastClub.clubRel:id,title,image,city')->get(['id', 'name', 'username', 'image', 'position', 'gender', 'citizenship']);
            foreach ($players as &$player){
                /* Append path to image */
                if(isset($player->image)) $player->image = '/images/profile-images/' . $player->image;

                /* Append path to country flag */
                if(isset($player->citizenshipRel)){
                    $player->citizenshipRel->flag_path = '/images/country-flags/';
                }

                /* Append path to club flag */
                if(isset($player->lastClub->clubRel->image)){
                    $player->lastClub->clubRel->image = '/images/club-images/' . $player->lastClub->clubRel->image;
                }
            }

            return response()->json([
                'code' => '0000',
                'players' => $players->toArray()
            ]);
        }catch (\Exception $e){
            return response()->json(['code' => '20000', 'message' => __('Desila se greška!')]);
        }
    }
}
