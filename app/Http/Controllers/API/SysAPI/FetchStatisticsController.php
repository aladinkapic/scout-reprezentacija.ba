<?php

namespace App\Http\Controllers\API\SysAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class FetchStatisticsController extends Controller{
    public function index(){
        Artisan::call('sys-api:fetch-players-statistics');

        return back()->with('message', 'Uspješno ažurirano!');
    }
}
