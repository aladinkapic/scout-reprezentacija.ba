<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    protected $_path = 'auth.';

    public function login(){
        if(Auth::check()) return redirect()->route('system.users.profile');
        return view($this->_path.'login');
    }
    public function logMeIn(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            if(!($user->active ?? '')){
                return json_encode(array('code' => '0001', 'message' => __('Pristup za korisnika '. ($user->name ?? '') .' zabranjen!')));
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
}
