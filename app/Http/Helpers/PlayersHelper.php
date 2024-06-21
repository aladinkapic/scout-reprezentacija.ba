<?php

use Carbon\Carbon;

class PlayersHelper{
    public static function age($birth_date){
        return Carbon::parse($birth_date)->age;
    }
    public static function searchUri($key, $value){
        return "/players/search?filter%5B%5D=".$key."&filter_values%5B%5D=".$value."&limit=12&page=1";
    }
    public static function searchData($key, $default, $translate = false){
        try{
            foreach (request('filter') as $k => $v){
                if($v == $key){
                    return ($translate) ?  __(request('filter_values')[$k]) : request('filter_values')[$k];
                }
            }
        }catch (\Exception $e){ return $default; }
        return $default;
    }
}
