<?php

namespace App\Http\Controllers\API\Players;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;
use App\Models\Posts\PostLike;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller{
    /*
     *  Like / dislike post
     */
    public function like(Request $request){
        try{
            $post = PostLike::where('post_id', $request->id)->where('ip', $this::getIP())->first();

            if(!$post){
                PostLike::create(['post_id' => $request->id, 'ip' => $this::getIP()]);
            }else{
                $post->delete();
            }

            $totalLikes = PostLike::where('post_id', $request->id )->count();

            Post::where('id', $request->id)->update([ 'likes' => $totalLikes]);

            return $this::success("", $totalLikes);
        }catch (\Exception $e){ return $this::error('8001', $e->getMessage()); }
    }

    /**
     *  Get last posts from players
     */
    public function lastPosts(Request $request){
        try{
            $total = isset($request->total) ? $request->total : 5;

            return response()->json([
                'code' => '0000',
                'data' => [
                    'posts' => Post::with('userRel:id,name,image')->where('category', 0)->orderBy('created_at', 'DESC')->take($total)->get(['id', 'owner', 'post', 'image', 'youtube', 'likes', 'created_at']),
                    'total' => $total,
                    'message' => __('Success')
                ]
            ]);
        }catch (\Exception $e){
            return response()->json(['code' => '20100', 'message' => __('Desila se greška!')]);
        }
    }
}
