<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use Illuminate\Http\Request;

class AdditionalController extends Controller{
    public function getClubs(){
        try{
            return $this::apiSuccess(__(''), '', Club::pluck('title', 'id'));
        }catch (\Exception $e){ return $this::apiSuccess('5000', __('Desila se greška, molimo kontaktirajte administratore!'), '');}
    }
}
