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
    protected function usersByUsername($username){
        try{
            $total = User::where('username', $username)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }
    public function getSlug($slug){
        $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//IGNORE', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $slug);

        $string = str_replace(array('[\', \']'), '', $slug);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        $string = strtolower(trim($string, '-'));

        return ($string . ($this->usersByUsername($string)));
    }

    public function createProfile(Request $request){
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $request['password'] = Hash::make('init_psw' . time());
            $request['api_token'] = hash('sha256', 'root'. '+'. time());
            $request['active'] = 0;
            $request['role'] = 1;
            $request['init_club'] = $request->club;
            $request['username'] = $this->getSlug($request->name);

            $user = User::where('email', $request->email)->first();
            if($user){
                return $this->apiError('10001', __('Već postoji korisnik sa unesenim email-om. '));
            }

            $user = User::create($request->all());
            /*
             *  Send emails; ToDo - Add admin emails!
             */
            try{
                Mail::to($request->email)->send(new sendEmail(
                    'obavještavamo Vas da je Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate naše kriterije.',
                    'Scout.Reprezentacija.BA'
                ));
            }catch (\Exception $e){}

            return $this::apiSuccess(
                __('Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate kriterije.!'),
                $user
            );
        }catch (\Exception $e){ dd($e); return $this::apiError(__('Desila se greška, molimo kontaktirajte administratore!'), '');}
    }
}
