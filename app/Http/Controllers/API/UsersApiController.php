<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\sendEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersApiController extends Controller{
    public function createProfile(Request $request){
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('y-m-d');
            $request['password'] = Hash::make('init_psw' . time());
            $request['api_token'] = hash('sha256', 'root'. '+'. time());
            $request['active'] = 0;

            dd($request->all());

            $user = User::create($request->all());
            /*
             *  Send emails; ToDo - Add admin emails!
             */
            Mail::to($request->email)->send(new sendEmail(
                'obaviještavamo Vas da je Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate naše kriterije.',
                'Scout.Reprezentacija.BA'
            ));

            return $this::apiSuccess(
                __('Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate kriterije.!'),
                $user
            );
        }catch (\Exception $e){ return $this::apiSuccess('5000', __('Desila se greška, molimo kontaktirajte administratore!'), '');}
    }
}
