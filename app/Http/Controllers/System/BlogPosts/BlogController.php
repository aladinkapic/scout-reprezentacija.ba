<?php

namespace App\Http\Controllers\System\BlogPosts;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller{
    /*
     *  This part is used to store posts from user
     *
     *  Note: Category 0 stands for user posts and category 1 stands for Club posts
     */

    public function save(Request $request){
        try{

            $youtubeLink = (isset($request->image)) ? null : $request->youtubeLink;

            if($request->has('image')){
                try{
                    $file = $request->file('image');
                    $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                    $name = md5($file->getClientOriginalName().time()).'.'.$ext;

                    $file->move(public_path().'/images/blog', $name);
                }catch (\Exception $e){}
            }

            $post = BlogPosts::create([
                'category' => '0',
                'owner' => Auth::id(),
                'post' => $request->post,
                'youtube' => $youtubeLink,
                'image' => isset($name) ? $name : ''
            ]);
        }catch (\Exception $e){ dd($e); }

        return back();
    }
}
