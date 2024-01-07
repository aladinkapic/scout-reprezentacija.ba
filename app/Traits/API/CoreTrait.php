<?php

namespace App\Traits\API;

use App\User;

trait CoreTrait{
    /*
     *  Get headers for API calls
     */
    protected function getPlayersBaseURI(){ return 'https://rezultati.reprezentacija.ba/'; }
    protected function getHeaders(){
        return [
            'User-Agent' => 'WebApp',
            'Accept'     => 'application/json',
            // 'x-apisports-key' => '00cdc2ab50670b5cee20a42ed29d59e3'
        ];
    }
}
