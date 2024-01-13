<?php

namespace App\Traits\API;

use App\User;

trait CoreTrait{
    /*
     *  Get headers for API calls
     */
    protected function getPlayersBaseURI(){ return 'https://rezultati.reprezentacija.ba/'; }
    protected function getBaseURI(){ return 'https://v3.football.api-sports.io/'; }
    protected function getHeaders(){
        return [
            'User-Agent' => 'WebApp',
            'Accept'     => 'application/json',
            // 'x-apisports-key' => '00cdc2ab50670b5cee20a42ed29d59e3'
        ];
    }
    protected function getApiSportHeaders(){
        return [
            'User-Agent' => 'WebApp',
            'Accept'     => 'application/json',
            'x-apisports-key' => '00cdc2ab50670b5cee20a42ed29d59e3'
        ];
    }


    /**
     *  Seasons in format CurrentYear / NextYear
     */
    public function getSeasonsYears(): array{
        $seasons = [];
        for($i=date('Y'); $i>=1980; $i--) $seasons[($i-1).' / '.$i] = ($i-1).' / '.$i;
        return $seasons;
    }
}
