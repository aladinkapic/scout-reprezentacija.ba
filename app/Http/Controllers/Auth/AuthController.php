<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\allowAccess;
use App\Mail\RestartPassword;
use App\Mail\sendEmail;
use App\Models\Additional\ClubData;
use App\Models\Additional\NatTeamData;
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
        if(Auth::check()) return redirect()->route('profile.posts');
        return view($this->_path.'login');
    }
    public function logMeIn(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            return json_encode([
                'code' => '0000',
                'message' => __('Uspješno ste se prijavili!'),
                'url' => ($user->active) ? route('profile.posts') : route('auth.create-new-profile')
            ]);

            /**
             *  Users without permission can access and update data
             */
            /*
            if(!($user->active ?? '')){
                return json_encode(array('code' => '0001', 'message' => __('Pristup za korisnika '. ($user->name ?? '') .' nije dozvoljen!')));
            }else{
                return json_encode([
                    'code' => '0000',
                    'message' => __('Uspješno ste se prijavili!'),
                    'url' => route('system.users.profile')
                ]);
            } */
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->active == 1) return redirect()->route('profile.posts');
        }
        return view($this->_path.'create-new-profile', [
            'countries' => Country::orderBy('name_ba')->pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite spol', ''),
            'phone_prefixes' => Keyword::where('keyword', 'phone_prefixes')->orderBy('value')->get()->pluck('value', 'value'),
            'user' => $user ?? null
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

            if(Auth::check()){
                Auth::user()->update($request->all());
            }else{
                $user = User::where('email', $request->email)->first();
                if($user){
                    return $this->apiError('10001', __('Već postoji korisnik sa unesenim email-om. '));
                }

                $user = User::create($request->all());

                Auth::loginUsingId($user->id);
            }

            return $this::apiSuccess('Uspješno spašeno!', route('auth.create-new-profile.career'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
    public function createNewProfileAddress (){
        if(!Auth::check()) return redirect()->route('auth.create-new-profile');
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

    /**
     * Info about club data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createNewProfileClubData  (){
        if(!Auth::check()) return redirect()->route('auth.create-new-profile');
        if((Auth()->user()->position == '')) return redirect()->route('auth.create-new-profile.career');

        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');

        /* Check for end of season ? */
        if(((int)date('m')) < 6){
            $current = (date('Y') - 1) . ' / ' . date('Y');
        }else{
            $current = date('Y') . ' / ' . (date('Y') + 1);
        }
        foreach ($seasons as $key => $val){ if($val == $current) $currentSeason = $key; }

        $clubData = ClubData::where('user_id', Auth::user()->id)->first();

        return view($this->_path.'create-new-profile-club-data', [
            'user' => Auth::user(),
            'seasons' => $seasons,
            'currentSeason' => $currentSeason ?? '',
            'clubData' => $clubData
        ]);
    }
    public function updateClubData(Request $request){
        if(!Auth::check()) $this::apiSuccess('Error', route('auth.create-new-profile'));

        try{
            if(!isset($request->club)){
                return $this->apiError('10201', __('Za unos informacija o klupskoj karijeri, odaberite Vaš klub!'));
                //Auth::user()->update(['note' => $request->note]);
                //if(!isset($request->note)){
                //    return $this->apiError('10201', __('Za unos informacija o klupskoj karijeri, odaberite Vaš klub!'));
                //}else return $this->apiError('10202', __('Vaša napomena je spremljena. Kontaktirati ćemo Vas nakon što unesemo Vaš klub!'));
            }
            if(!isset($request->season_name) or !isset($request->no_games) or !isset($request->goals) or !isset($request->assistance) or !isset($request->minutes) or !isset($request->red_cards) or !isset($request->yellow_cards)){
                return $this->apiError('10202', __('Molimo popunite sva polja!'));
            }

            $clubData = ClubData::where('user_id', Auth::user()->id)->first();
            $request['user_id'] = Auth::user()->id;
            $request['club_id'] = $request->club;

            if(!$clubData){
                $clubData = ClubData::create($request->except(['_token', 'club']));
            }else{
                $clubData->update($request->except(['_token', 'club']));
            }

            return $this::apiSuccess('Uspješno ažurirano', route('auth.create-new-profile.national-team-data'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }

    /**
     *  Info about national team data
     */
    public function createNewProfileNTData (){
        if(!Auth::check()) return redirect()->route('auth.create-new-profile');
        $clubData = ClubData::where('user_id', Auth::user()->id)->first();
        if(!isset($clubData)) return redirect()->route('auth.create-new-profile.club-data');

        $seasons = Keyword::where('keyword', 'seasons')->orderBy('id', 'DESC')->get()->pluck('value', 'id');

        /* Check for end of season ? */
        if(((int)date('m')) < 6){
            $current = (date('Y') - 1) . ' / ' . date('Y');
        }else{
            $current = date('Y') . ' / ' . (date('Y') + 1);
        }
        foreach ($seasons as $key => $val){ if($val == $current) $currentSeason = $key; }

        $clubData = NatTeamData::where('user_id', Auth::user()->id)->first();

        return view($this->_path.'create-new-profile-nt', [
            'user' => Auth::user(),
            'seasons' => $seasons,
            'countries' => Country::pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'team' => Keyword::where('keyword', 'nat_team')->pluck('value', 'id'),
            'currentSeason' => $currentSeason ?? '',
            'clubData' => $clubData
        ]);
    }
    public function sendEmail(){
        try{
            $adminMsg = 'obaviještavamo Vas da je ' . Auth()->user()->name . ' (' . Auth()->user()->email . ') poslao/la zahtjev za kreiranje profila na platformi www.scout.reprezentacija.ba. Molimo revidirajte prijavu!';
            Mail::to(env('EMAIL'))->send(new sendEmail($adminMsg,  'Scout.Reprezentacija.BA' ));

            Mail::to(Auth()->user()->email)->send(new sendEmail(
                'obavještavamo Vas da je Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate naše kriterije.',
                'Scout.Reprezentacija.BA'
            ));
        }catch (\Exception $e){}
    }
    public function updateNTData(Request $request){
        if(!Auth::check()) $this::apiSuccess('Error', route('auth.create-new-profile'));

        if(!isset(Auth::user()->image)) return $this->apiError('10221', __('Molimo da unesete Vašu sliku profila'));

        try{
            if($request->skip == 0){
                Auth::user()->update(['submitted' => 1]);
                $this->sendEmail();

                return $this::apiError('10230', 'Prijava uspješno završena!');
            }else{
                if(!isset($request->country_id)) return $this->apiError('10222', __('Molimo da odaberete državu'));
                if(!isset($request->no_games)) return $this->apiError('10223', __('Molimo da unesete broj utakmica'));
                if(!isset($request->goals)) return $this->apiError('10224', __('Molimo da unesete broj golova'));
                if(!isset($request->assistance)) return $this->apiError('10225', __('Molimo da unesete broj asistencija'));
                if(!isset($request->minutes)) return $this->apiError('10226', __('Molimo da unesete broj odigranih minuta'));
                if(!isset($request->red_cards)) return $this->apiError('10227', __('Molimo da unesete broj crvenih kartona'));
                if(!isset($request->yellow_cards)) return $this->apiError('10228', __('Molimo da unesete broj žutih kartona'));

                $clubData = NatTeamData::where('user_id', Auth::user()->id)->first();
                $request['user_id'] = Auth::user()->id;

                if(!$clubData){
                    $clubData = NatTeamData::create($request->except(['_token']));
                }else{
                    $clubData->update($request->except(['_token']));
                }
            }

            Auth::user()->update(['submitted' => 1]);
            $this->sendEmail();

            return $this::apiError('10230', 'Prijava uspješno završena!');
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
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
                        'url' => route('profile.posts')
                    ]);
                }
            }else{}
        }catch (\Exception $e){}
    }
}
