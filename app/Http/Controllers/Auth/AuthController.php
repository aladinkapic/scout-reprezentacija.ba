<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\allowAccess;
use App\Mail\RestartPassword;
use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Traits\Common\CommonTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller{
    use CommonTrait;
    protected $_path = 'auth.';

    public function login(){
        if(Auth::check()) return redirect()->route('system.users.profile');
        return view($this->_path.'login');
    }
    public function logMeIn(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            if(!($user->active ?? '')){
                return json_encode(array('code' => '0001', 'message' => __('Pristup za korisnika '. ($user->name ?? '') .' nije dozvoljen!')));
            }else{
                return json_encode([
                    'code' => '0000',
                    'message' => __('Uspješno ste se prijavili!'),
                    'url' => route('system.users.profile')
                ]);
            }
        }else {
            return json_encode([
                'code' => '4001',
                'message' => __('Pogrešni pristupni podaci. Molimo pokušajte ponovo!')
            ]);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

    /*
     *  Create new profile (new users)
     */
    public function createProfile(){
        return view($this->_path.'create-profile', [
            'countries' => Country::orderBy('name_ba')->pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite spol', ''),
            'phone_prefixes' => Keyword::where('keyword', 'phone_prefixes')->orderBy('value')->get()->pluck('value', 'value'),
        ]);
    }
    public function createNewProfile(){
        return view($this->_path.'create-new-profile', [
            'countries' => Country::orderBy('name_ba')->pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite spol', ''),
            'phone_prefixes' => Keyword::where('keyword', 'phone_prefixes')->orderBy('value')->get()->pluck('value', 'value'),
        ]);
    }
    public function updateBasicInfo (Request $request){
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $request['password'] = Hash::make($request->password);
            $request['api_token'] = hash('sha256', $request->email. '+'. time());
            $request['active'] = 0; // User is not active yet
            $request['role'] = 1;   // User
            $request['sport'] = 3;  // Default soccer
            $request['username'] = $this->getSlug($request->name);

            $user = User::where('email', $request->email)->first();
            if($user){
                return $this->apiError('10001', __('Već postoji korisnik sa unesenim email-om. '));
            }

            $user = User::create($request->all());

            Auth::loginUsingId($user->id);

            return $this::apiSuccess('Uspješno spašeno!', route('auth.create-new-profile.career'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
    public function createNewProfileAddress (){
        return view($this->_path.'create-new-profile-career', [
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'position' => Keyword::where('keyword', 'position_football')->pluck('value', 'id')->prepend('Odaberite poziciju', ''),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id')->prepend('Odaberite', ''),
            'user' => Auth::user()
        ]);
    }
    public function updateCareer (Request $request){
        try{
            User::where('id', Auth::user()->id)->update($request->except(['_token']));

            return $this::apiSuccess('Uspješno spašeno!', route('auth.create-new-profile.club-data'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
    public function createNewProfileClubData  (){
        return view($this->_path.'create-new-profile-club-data', [
            'user' => Auth::user()
        ]);
    }
    /**
     *  Forgot password logic
     */
    public function forgotPassword (){
        return view($this->_path.'forgot-password');
    }
    public function sendEmailForNewPsw (Request $request){
        try{
            $user = User::where('email', $request->email)->first();

            Mail::to($user->email)->send(new RestartPassword($user->email, $user->name, $user->gender, $user->username, $user->api_token));

            return json_encode([
                'code' => '0000',
                'message' => __('Email sa instrukcijama za izmjenu šifre je poslan. Molimo slijedite upute!')
            ]);
        }catch (\Exception $e){
            return json_encode([
                'code' => '4001',
                'message' => __('Desila se greška, molimo pokušajte ponovo!')
            ]);
        }
    }
    public function restartPassword ($username, $token){
        $user = User::where('api_token', $token)->first();

        if(!$user) return redirect()->route('auth.login');
        return view($this->_path.'new-password', [
            'user' => $user
        ]);
    }
    public function setNewPassword(Request $request){
        try{
            User::where('api_token', $request->api_token)->update([
                'password' => Hash::make($request->password)
            ]);

            $user = User::where('api_token', $request->api_token)->first();

            if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){
                $user = Auth::user();

                if(!($user->active ?? '')){
                    return json_encode(array('code' => '0001', 'message' => __('Pristup za korisnika '. ($user->name ?? '') .' nije dozvoljen!')));
                }else{
                    return json_encode([
                        'code' => '0000',
                        'message' => __('Uspješno ste izmijenili Vašu šifru!'),
                        'url' => route('system.users.profile')
                    ]);
                }
            }else{}
        }catch (\Exception $e){}
    }
}
