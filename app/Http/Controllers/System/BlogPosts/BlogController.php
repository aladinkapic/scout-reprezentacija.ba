<?php

namespace App\Http\Controllers\System\BlogPosts;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPosts;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller{
    /*
     *  This part is used to store posts from user
     *
     *  Note: Category 0 stands for user posts and category 1 stands for Club posts
     */

    protected function update(Request $request){
        try{
            $name = $request->edit_post_image;

            if($request->has('image')){
                try{
                    $file = $request->file('image');
                    $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                    $name = md5($file->getClientOriginalName().time()).'.'.$ext;

                    $file->move(public_path().'/images/blog', $name);
                }catch (\Exception $e){}
            }
            $youtubeLink = (isset($name)) ? null : $request->youtubeLink;

            BlogPosts::find($request->post_id)->update([
                'post' => $request->post,
                'youtube' => $youtubeLink,
                'image' => $name
            ]);
        }catch (\Exception $e){}
    }

    public function save(Request $request){
        try{
            if(isset($request->edit_post)){
                $this->update($request);
                return back();
            }
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
                'category' => $request->category,
                'owner' => $request->owner,
                'post' => $request->post,
                'youtube' => $youtubeLink,
                'image' => isset($name) ? $name : ''
            ]);
        }catch (\Exception $e){ dd($e); }

        return back();
    }

    /*
     *  Get data from post; Json response
     */
    public function getData(Request $request){
        try{
            return json_encode([
                'code' => '0000',
                'data' => BlogPosts::find($request->id)
            ]);
        }catch (\Exception $e){
            return json_encode(['code' => '5000']);
        }
    }

    public function delete ($id){
        try{
            BlogPosts::find($id)->delete();
        }catch (\Exception $e){}
        return back();
    }
}
