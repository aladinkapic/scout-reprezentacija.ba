<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\API\UsersApiController;
use App\Http\Controllers\Controller;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Traits\Common\CommonTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller{
    use CommonTrait;
    protected $_path = 'public.users.';

    public function info(){
        return view($this->_path . 'info', [
            'countries' => Country::orderBy('name_ba')->pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id')->prepend('Odaberite spol', ''),
            'phone_prefixes' => Keyword::where('keyword', 'phone_prefixes')->orderBy('value')->get()->pluck('value', 'value'),
        ]);
    }
    public function updateInfo (Request $request){
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $slug = (new UsersApiController)->constructSlug($request->name);
            $totalUsers = User::where('username', $slug)->where('id', '!=', Auth::user()->id)->get();

            if($totalUsers->count()){
                $slug .= $totalUsers->count();
            }

            $request['username'] = $slug;
            Auth::user()->update($request->all());

            return $this::apiSuccess('Uspješno spašeno!', route('profile.info'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }

    /**
     *  Career info
     */
    public function career(){
        return view($this->_path . 'career', [
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'position' => Keyword::where('keyword', 'position_football')->pluck('value', 'id')->prepend('Odaberite poziciju', ''),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id')->prepend('Odaberite', '')
        ]);
    }
    public function updateCareer (Request $request){
        try{
            User::where('id', Auth::user()->id)->update($request->except(['_token']));

            return $this::apiSuccess('Uspješno spašeno!', route('profile.info.career'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }

    public function changePassword(){
        return view($this->_path . 'change-password');
    }
    public function updatePassword (Request $request){
        try{
            $request['password'] = Hash::make($request->password);

            User::where('id', Auth::user()->id)->update(['password' => $request->password]);

            return $this::apiSuccess('Uspješno spašeno!', route('profile.info'));
        }catch (\Exception $e){
            return $this->apiError('10001', __('Desila se greška! Molimo da kontaktirate administratora!'));
        }
    }
}
