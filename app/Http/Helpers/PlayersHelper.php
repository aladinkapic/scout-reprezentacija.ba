<?php

use Carbon\Carbon;

class PlayersHelper{
    public static function age($birth_date){
        return Carbon::parse($birth_date)->age;
    }
}
