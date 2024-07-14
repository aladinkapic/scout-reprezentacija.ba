<?php

namespace App\Traits\Common;

use App\User;

trait CommonTrait{
    /**
     * @param $username
     * @return string
     */
    protected function usersByUsername($username){
        try{
            $total = User::where('username', $username)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }

    /**
     * @param $slug
     * @return string
     */
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

    /**
     * @param $slug
     * @return string
     */
    public function getSlug($slug){
        $string = $this->constructSlug($slug);
        return ($string . ($this->usersByUsername($string)));
    }
}
