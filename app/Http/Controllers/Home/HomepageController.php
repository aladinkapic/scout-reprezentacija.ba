<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Additional\Partner;
use App\Models\Additional\Quote;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Core\Affiliation;
use App\Models\Additional\Club;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller {
    protected $_path = 'public.app.';
    protected $_api_images = [];

    public function getYearRange(){
        $array = [];
        for($i = date('Y'); $i > 1970; $i--) $array[$i] = $i;
        return $array;
    }

    public function home(){
        $apiData = [];

        if(App::getLocale() == 'bs'){
            try{
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', 'https://reprezentacija.ba/wp-json/wp/v2/posts');
                $apiData  = json_decode($response->getBody()->getContents());

                $counter = 0;
                foreach ($apiData as $data){
                    $imageResponse = $client->request('GET', $apiData[$counter]->_links->{'wp:featuredmedia'}[0]->href);
                    $data->image_url = json_decode($imageResponse->getBody()->getContents())->source_url;

                    $counter ++;

                    if($counter > 3) break;
                }
            }catch (\Exception $e){ }

            $countries = Country::orderBy('name_ba')->pluck('name_ba', 'name_ba')->prepend(__('Odaberite državu'), '');
        }else{
            $countries = Country::orderBy('name_ba')->pluck('name', 'name_ba')->prepend(__('Odaberite državu'), '');
        }


        return view($this->_path.'home', [
            'countries' => $countries,
            // 'clubs' => Club::pluck('title', 'title')->prepend('Odaberite klub', '')->prepend('Odaberite klub', ''),
            'sports' => $this->translateKeywords(Keyword::where('keyword', 'sport')->pluck('value', 'value'))->prepend(__('Svi sportovi'), ''),
            'positions' => $this->translateKeywords(Keyword::where('keyword', 'position_football')->pluck('value', 'value'))->prepend(__('Sve pozicije'), ''),
            'strongerLimb' => $this->translateKeywords(Keyword::where('keyword', 'arm_leg')->pluck('value', 'value'))->prepend(__('Odaberite'), ''),
            'gender' => $this->translateKeywords(Keyword::where('keyword', 'gender')->pluck('value', 'value'))->prepend(__('Odaberite spol'), ''),
            'partners' => Partner::get(),
            'range' => $this->getYearRange(),
            'quotes' => Quote::inRandomOrder()->get()->take(2),
            'apiData' => $apiData
        ]);
    }

    public function switchLanguage ($lan): RedirectResponse{
        Session::put('locale', $lan);

        return redirect()->back();
    }

    public function register(){
        $countries = Country::orderBy('name_ba')->pluck('name_ba', 'id');

        return view($this->_path.'register', [
            'countries' => $countries,
            'clubs' => Club::pluck('title', 'id')->prepend('Odaberite klub', '')->prepend('Odaberite klub', ''),
            'sports' => Keyword::where('keyword', 'sport')->pluck('value', 'id')->prepend('Odaberite sport', ''),
            'citizenship' => $countries
        ]);
    }

    public function searchResults(){

    }
}
