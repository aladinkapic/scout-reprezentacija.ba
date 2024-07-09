<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class BaseHelper{

    public static function getLocale(): string{
        $mainLocale = 'BiH';
        if (Session::has('locale') ) {
            if(Session::get('locale') == 'en') $mainLocale = 'ENG';
            else if(Session::get('locale') == 'it') $mainLocale = 'ITA';
            else if(Session::get('locale') == 'de') $mainLocale = 'GER';
        }

        return $mainLocale;
    }
    public static function getLocaleImg(): string{
        $mainLocale = 'bosnia';
        if (Session::has('locale') ) {
            if(Session::get('locale') == 'en') $mainLocale = 'uk';
            else if(Session::get('locale') == 'it') $mainLocale = 'italy';
            else if(Session::get('locale') == 'de') $mainLocale = 'germany';
        }

        return $mainLocale;
    }
}
