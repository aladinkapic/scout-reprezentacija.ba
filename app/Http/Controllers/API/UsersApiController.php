<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\sendEmail;
use App\Models\Additional\Club;
use App\Models\Additional\ClubData;
use App\Models\Core\Keywords\Keyword;
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
    public function constructSlug($slug): string{
        $slug = str_replace('Đ', 'D', $slug);
        $slug = str_replace('đ', 'd', $slug);
        $slug = str_replace('ć', 'c', $slug);
        $slug = str_replace('Ć', 'C', $slug);
        $slug = str_replace('č', 'c', $slug);
        $slug = str_replace('Č', 'c', $slug);
        $slug = str_replace('š', 's', $slug);
        $slug = str_replace('Š', 'S', $slug);

        $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//IGNORE', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $slug);

        $string = str_replace(array('[\', \']'), '', $slug);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);

        return strtolower(trim($string, '-'));
    }
    public function getSlug($slug){
        $string = $this->constructSlug($slug);
        return ($string . ($this->usersByUsername($string)));
    }

    public function createProfile(Request $request){
        try{
            // $club = Club::where('id', $request->club)->first();
            // $clubName = $club->title . " (" . ($club->countryRel->name_ba) . ")";
            $season = Keyword::where('value', 'LIKE', '%' . date('Y') . '%')->first();

            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $request['password'] = Hash::make('init_psw' . time());
            $request['api_token'] = hash('sha256', 'root'. '+'. time());
            $request['active'] = 0;
            $request['role'] = 1;
            // $request['init_club'] = $clubName;
            $request['username'] = $this->getSlug($request->name);

            $adminEmail = 'bojanseleskovic@gmail.com';
            $adminMsg = 'obaviještavamo Vas da je ' . $request->name . ' (' . $request->email . ') poslao/la zahtjev za kreiranje profila na platformi www.scout.reprezentacija.ba. Molimo revidrajte prijavu!';

            $user = User::where('email', $request->email)->first();
            if($user){
                return $this->apiError('10001', __('Već postoji korisnik sa unesenim email-om. '));
            }

            $user = User::create($request->all());

            try{
                /* Create club data information */
                $clubData = ClubData::create([
                    'user_id' => $user->id,
                    'season' => $season->id,
                    'club_id' => $request->club
                ]);
            }catch (\Exception $e){}

            /*
             *  Send emails; ToDo - Add admin emails!
             */
            try{
                Mail::to($request->email)->send(new sendEmail(
                    'obavještavamo Vas da je Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate naše kriterije.',
                    'Scout.Reprezentacija.BA'
                ));

                Mail::to($adminEmail)->send(new sendEmail($adminMsg,  'Scout.Reprezentacija.BA' ));
            }catch (\Exception $e){}

            return $this::apiSuccess(
                __('Vaš zahtjev za kreiranje profila na portalu scout.reprezentacija.ba uspješno kreiran. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ukoliko ispunjavate kriterije.!'),
                $user
            );
        }catch (\Exception $e){ return $this::apiError('100002', __('Desila se greška, molimo kontaktirajte administratore!'), '');}
    }
}
