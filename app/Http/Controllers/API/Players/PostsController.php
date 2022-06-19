<?php

namespace App\Http\Controllers\API\Players;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;
use App\Models\Posts\PostLike;
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
}
