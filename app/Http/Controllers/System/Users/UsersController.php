<?php

namespace App\Http\Controllers\System\Users;

use App\Http\Controllers\API\UsersApiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Mail\allowAccess;
use App\Mail\sendEmail;
use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Models\Posts\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller{
    protected $_path = 'system.app.users.';
    public static function quickRandom($length = 16){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#%&()';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function index(){
        $users = User::where('role', '!=', 0);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => 'Email',
            'sportRel.value' => __('Sport'),
            'positionRel.value' => __('Pozicija'),
            'height' => __('Visina'),
            'strongerLimbRel.value' => __('Snažnija noga'),
            'genderRel.value' => __('Spol')
        ];

        return view($this->_path . '.index', [
            'filters' => $filters,
            'users' => $users
        ]);
    }

    public function data($action = 'create', $id = null){
        if(isset($id)){
            $user = User::find($id);
            if($user->sport == 3) $position = Keyword::where('keyword', 'position_football')->pluck('value', 'id')->prepend('Odaberite', '');
            else if($user->sport == 4) $position = Keyword::where('keyword', 'position_futsal')->pluck('value', 'id')->prepend('Odaberite', '');
            else $position = Keyword::where('keyword', 'position_football')->pluck('value', 'id')->prepend('Odaberite', '');
        }else $position = Keyword::where('keyword', 'position_football')->pluck('value', 'id');

        return view($this->_path . 'create', [
            $action => true,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite', ''),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite', ''),
            'position' => $position,
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id')->prepend('Odaberite', ''),
            'active' => Keyword::where('keyword', 'active')->pluck('value', 'id')->prepend('Odaberite', ''),
            'user' => isset($id) ? $user : null
        ]);
    }
    public function create(){ return $this->data(); }

    public function save(Request $request){
        $request = $this::format($request);

        $request['password'] = Hash::make($request->password);
        $request->request->add(['api_token' => hash('sha256', $request->email . '+' . time())]);

        $apiController = new UsersApiController();
        $request['username'] = $apiController->getSlug($request->name);

        try {
            $user = User::create($request->all());
            return $this::success(route('system.users.preview', ['id' => $user->id]));
        } catch (\Exception $e) {
            return $this::error($e->getCode(), $e->getMessage());
        }
    }

    public function preview($id){ return $this->data('preview', $id); }
    public function edit($id){ return $this->data('edit', $id); }
    public function delete($id){
        try{
            $user = User::where('id', $id)->first();
            $name = $user->name;

            $user->delete();

            return redirect()->route('system.users.index')->with('success', __('Uspješno obrisan korisnik ' . $name));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška prilikom brisanja, molimo pokušajte ponovo !'));
        }
    }
    public function update(Request $request){

        try {
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            if($request->active == 1){
                $user = User::find($request->id);
                if($user->active == 0){
                    $password = $this::quickRandom(10);
                    $request['password'] = Hash::make($password);

                    Mail::to($request->email)->send(new allowAccess($user->email, $user->name, $password));
                }
            }
            User::where('id', $request->id)->update($request->except('_method', '_token'));

            return $this::success(route('system.users.preview', ['id' => $request->id]));
        } catch (\Exception $e) {
            return $this::error($e->getCode(), $e->getMessage());
        }
    }

    // -------------------------------------------------------------------------------------------------------------- //
    /*
     *  Posts data
     */
    public function profile(){ return $this->data('profile', Auth::id()); }
    public function savePost(Request $request){
        try{
            Post::create([
                'owner' => Auth::id(),
                'content' => $request->summernoteDesc
            ]);
            return $this::success(route('system.users.profile'));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function editPost ($id){
        $post = Post::find($id);
        if($post->owner != Auth::id()) return redirect()->route('system.users.profile');
        return view($this->_path.'posts.edit-post', [
            'post' => $post
        ]);
    }
    public function updatePost(Request $request){
        try{
            Post::where('id', $request->id)->update(['content' => $request->summernoteDesc]);
            return $this::success(route('system.users.profile'));
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
    }
    public function deletePost ($id){
        try{
            $post = Post::find($id);
            if($post->owner == Auth::id()) $post->delete();
        }catch (\Exception $e){}
        return redirect()->route('system.users.profile');
    }

    /*
     *  Edit profile by user, not admin
     */
    public function editMyProfile(){ return $this->data('editMyProfile', Auth::id()); }
    public function updateProfile(Request $request){
        $request = $this::format($request);
        try {
            User::find($request->id)->update(
                $request->except(['_token', '_method', 'id'])
            );
            return $this::success(route('system.users.profile'));
        } catch (\Exception $e) { return $this::error($e->getCode(), $e->getMessage()); }
    }

    // -------------------------------------------------------------------------------------------------------------- //

    public function changeProfileImage (Request $request){
        try{
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = md5(time() . (Auth::user()->name ?? 'JohnDoe') ).'.'.'png';
            File::put(public_path(). '/images/profile-images/' . $imageName, base64_decode($image));

            User::where('id', Auth::id())->update(['image' => $imageName]);
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
        return $this::success('');
    }
    public function imageCrop(){
        return view($this->_path.'snippets.image-crop');
    }
}
