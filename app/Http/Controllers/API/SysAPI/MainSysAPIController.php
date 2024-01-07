<?php

namespace App\Http\Controllers\API\SysAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainSysAPIController extends Controller{
    protected $_path = 'system.app.api.sys-api.';
    public function index(){
        return view($this->_path . 'main-sys-api');
    }
}
