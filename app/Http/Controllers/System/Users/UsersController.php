<?php

namespace App\Http\Controllers\System\Users;

use App\Http\Controllers\API\UsersApiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Mail\allowAccess;
use App\Mail\sendEmail;
use App\Models\Additional\ClubData;
use App\Models\Additional\NatTeamData;
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

    public function getUsers($users){
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => 'Email',
            'sportRel.value' => __('Sport'),
            'positionRel.value' => __('Pozicija'),
            'height' => __('Visina'),
            'strongerLimbRel.value' => __('Snažnija noga'),
            'genderRel.value' => __('Spol'),
            'clubDataRel.clubRel.title' => __('Klubovi'),
            'clubDataRel.clubRel.countryRel.name_ba' => __('Država kluba'),
            'statusRel.value' => __('Status igrača'),
            'submittedRel.value' => __('Status prijave'),
        ];

        return view($this->_path . '.index', [
            'filters' => $filters,
            'users' => $users
        ]);
    }
    public function index(){
        $users = User::where('role', '!=', 0)->where('from_api', '=', 0);
        return $this->getUsers($users);
    }
    public function indexAPI (){
        $users = User::where('role', '!=', 0)->where('from_api', '=', 1);
        return $this->getUsers($users);
    }

    public function data($action = 'create', $id = null, $root = null){
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
            'user' => isset($id) ? $user : null,
            'root' => $root
        ]);
    }
    public function create(){ return $this->data(); }

    public function save(Request $request){
        $request = $this::format($request);

        $request['password'] = Hash::make($request->password);
        $request->request->add(['api_token' => hash('sha256', $request->email . '+' . time())]);
        $request['name'] = $request->fname . ' ' . $request->lname;

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
    public function previewWall($id){ return $this->data('profile', $id, true); }
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
    public function switchToUser($id){
        try{
            $user = User::where('id', $id)->first();
            Auth::logout();
            Auth::loginUsingId($id);

            return redirect()->route('system.users.profile')->with('success', __('Sada impersonirate korisnika/cu ' . $user->name ));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška prilikom brisanja, molimo pokušajte ponovo !'));
        }
    }
    public function update(Request $request){
        try {
            $request['name'] = $request->fname . ' ' . $request->lname;
            $slug = (new UsersApiController)->constructSlug($request->name);
            $totalUsers = User::where('username', $slug)->where('id', '!=', $request->id)->get();

            if($totalUsers->count()){
                $slug .= $totalUsers->count();
            }

            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $request['username'] = $slug;

            if($request->active == 1){
                $user = User::find($request->id);
                if($user->active == 0){
                    $password = $this::quickRandom(10);
                    $request['password'] = Hash::make($password);

                    Mail::to($request->email)->send(new allowAccess($user->email, $user->name, $user->username, $password, $user->gender));
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
    public function editPlayerData($id, $action = 'edit', $view = 'basic_info'){
        $user = User::find($id);
        if($user->sport == 3) $position = Keyword::where('keyword', 'position_football')->pluck('value', 'id');
        else if($user->sport == 4) $position = Keyword::where('keyword', 'position_futsal')->pluck('value', 'id');
        else $position = Keyword::where('keyword', 'position_football')->pluck('value', 'id');

        return view($this->_path . 'players.' . $view, [
            $action => true,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite', ''),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite', ''),
            'position' => $position->prepend('Odaberite poziciju', ''),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id')->prepend('Odaberite', ''),
            'active' => Keyword::where('keyword', 'active')->pluck('value', 'id')->prepend('Odaberite', ''),
            'user' => isset($id) ? $user : null
        ]);
    }
    public function editMyProfile(){ return $this->editPlayerData(Auth::id(), "edit", "basic_info"); }
    public function editCareer (){ return $this->editPlayerData(Auth::id(), "edit", "career"); }
    public function editSocialNetworks (){ return $this->editPlayerData(Auth::id(), "edit", "social_networks"); }
    public function updateProfile(Request $request){
        $request = $this::format($request);
        try {
            $request['name'] = $request->fname . ' ' . $request->lname;

            if(isset($request->name)){
                $slug = (new UsersApiController)->constructSlug($request->name);
                $totalUsers = User::where('username', $slug)->where('id', '!=', $request->id)->get();

                if($totalUsers->count()){
                    $slug .= $totalUsers->count();
                }

                $request['username'] = $slug;
            }

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

            $path = env('USER_IMG_LINK', public_path(). '/images/profile-images/');
            File::put($path . $imageName, base64_decode($image));
            User::where('id', Auth::id())->update(['image' => $imageName]);
        }catch (\Exception $e){ return $this::error($e->getCode(), $e->getMessage()); }
        return $this::success('');
    }
    public function imageCrop(){
        return view($this->_path.'snippets.image-crop');
    }

    /**
     *  Root routes; Preview as user
     */
    public function previewAsUser ($id){
        return view($this->_path . 'new-profile.personal-data', [
            'countries' => Country::orderBy('name_ba')->pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite spol', ''),
            'phone_prefixes' => Keyword::where('keyword', 'phone_prefixes')->orderBy('value')->get()->pluck('value', 'value'),
            'user' => User::where('id', '=', $id)->first()
        ]);
    }
    public function previewAsUserCareer ($id){
        return view($this->_path.'new-profile.career', [
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'position' => Keyword::where('keyword', 'position_football')->pluck('value', 'id')->prepend('Odaberite poziciju', ''),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id')->prepend('Odaberite', ''),
            'user' => User::where('id', '=', $id)->first()
        ]);
    }
    public function previewAsUserClub ($id){
        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');

        /* Check for end of season ? */
        if(((int)date('m')) < 6){
            $current = (date('Y') - 1) . ' / ' . date('Y');
        }else{
            $current = date('Y') . ' / ' . (date('Y') + 1);
        }
        foreach ($seasons as $key => $val){ if($val == $current) $currentSeason = $key; }

        $clubData = ClubData::where('user_id', $id)->first();

        return view($this->_path.'new-profile.club', [
            'user' => User::where('id', '=', $id)->first(),
            'seasons' => $seasons,
            'currentSeason' => $currentSeason ?? '',
            'clubData' => $clubData
        ]);
    }
    public function previewAsUserNatTeam ($id){
        $clubData = ClubData::where('user_id', Auth::user()->id)->first();

        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');

        /* Check for end of season ? */
        if(((int)date('m')) < 6){
            $current = (date('Y') - 1) . ' / ' . date('Y');
        }else{
            $current = date('Y') . ' / ' . (date('Y') + 1);
        }
        foreach ($seasons as $key => $val){ if($val == $current) $currentSeason = $key; }

        $clubData = NatTeamData::where('user_id', Auth::user()->id)->first();

        return view($this->_path.'new-profile.nat-team', [
            'user' => User::where('id', '=', $id)->first(),
            'seasons' => $seasons,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'team' => Keyword::where('keyword', 'nat_team')->pluck('value', 'id'),
            'currentSeason' => $currentSeason ?? '',
            'clubData' => $clubData
        ]);
    }
}
