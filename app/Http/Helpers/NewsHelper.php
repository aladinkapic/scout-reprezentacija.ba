<?php

use Carbon\Carbon;

class NewsHelper{
    protected static $_months = [
        'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'
    ];

    public static function getDay($date){
        return Carbon::parse($date)->format('d');
    }
    public static function getMonth($date){
        return self::$_months[(int)(Carbon::parse($date)->format('m') - 1)];
    }
    public static function getFirstNLetters($string, $letters = 200): string{
        $string = str_replace("<br />", "", $string);
        $string = str_replace("\n", "", $string);
        $string = strip_tags($string);

        return mb_substr($string, 0, $letters);
    }
}
