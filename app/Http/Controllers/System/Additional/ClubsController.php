<?php

namespace App\Http\Controllers\System\Additional;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Additional\Club;
use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Models\Posts\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ClubsController extends Controller{
    protected $_path = 'system.app.additional.clubs.';

    public function index(){
        $clubs = Club::where('id', '>', 0);
        $clubs = Filters::filter($clubs);
        $filters = [
            'title' => __('Naziv kluba'),
            'year' => 'Godina osnivanja',
            'city' => __('Grad'),
            'countryRel.name_ba' => 'Država',
            'categoryRel.value' => __('Kategorija'),
            'ownerRel.name' => __('Odgovorna osoba')
        ];
        return view($this->_path.'index', ['clubs' => $clubs, 'filters' => $filters]);
    }
    public function data($action = 'create', $id = null){
        return view($this->_path.'create', [
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id'),
            $action => true,
            'club' => isset($id) ? Club::find($id) : null,
            'users' => User::pluck('name', 'id')
        ]);
    }
    public function checkAccess($id){
        $club = Club::find($id);
        if(Auth::user()->role == 0) return;
        if($club->owner != Auth::id()) abort('404');
    }
    public function create(){return $this->data();}
    public function save (Request $request){
        try {
            $club = Club::create($request->all());
            return $this::success(route('system.additional.clubs.timeline', ['id' => $club->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function preview($id){
        $this->checkAccess($id);
        return $this->data('preview', $id);
    }
    public function timeline ($id){
        $this->checkAccess($id);
        return $this->data('timeline', $id);
    }
    public function edit($id){
        $this->checkAccess($id);
        return $this->data('edit', $id);
    }
    public function update (Request $request){
        try {
            Club::where('id', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this::success(route('system.additional.clubs.timeline', ['id' => $request->id]));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function updateImage (Request $request){
        try{
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = md5(time() . (Auth::user()->name ?? 'JohnDoe') ).'.'.'png';
            $path = env('CLUB_IMG_LINK', public_path(). '/images/club-images/');
            dd($path);
            File::put($path . $imageName, base64_decode($image));

            Club::where('id', $request->club)->update(['image' => $imageName]);
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
        return $this::success('');
    }

    /*
     *  Posts info
     */
    public function savePost (Request $request){
        try{
            Post::create([
                'what' => 1,
                'owner' => $request->id,
                'content' => $request->description
            ]);
            return $this::success(route('system.additional.clubs.timeline', ['id' => $request->id ]));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function editPost($id){
        $post = Post::find($id);
        return view($this->_path.'edit-post', [
            'post' => $post,
            'club' => Club::find($post->owner)
        ]);
    }
    public function updatePost (Request $request){
        try{
            $post = Post::find($request->id);
            $post->update(['content' => $request->description]);
            return $this::success(route('system.additional.clubs.timeline', ['id' => $post->owner ]));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function deletePost ($id){
        try{
            $post = Post::find($id);
            $owner = $post->owner;
            $post->delete();

            return redirect()->route('system.additional.clubs.timeline', ['id' => $owner ]);
        }catch (\Exception $e){ return redirect()->back(); }
    }
}
