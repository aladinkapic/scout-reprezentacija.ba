<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $_response = [
        'code' => '0000',
        'message' => ''
    ];

    // -------------------------------------------------------------------------------------------------------------- //
    /*
     *  Format request : If date is dd.mm.yyy, format it to yyyy-mm-dd
     */

    public static function getDate($datum){
        return Carbon::parse($datum)->format('Y-m-d');
    }
    public static function checkDateTime($x){
        return (date('d.m.Y', strtotime($x)) == $x);
    }
    public static function format(Request $request){
        foreach ($request->request as $req => $key) {
            if (gettype($key) === 'string') {
                if ((new self)->checkDateTime($key)) {
                    $request[$req] = (new self)->getDate($key);
                }
            }else if(gettype($key) == 'array'){
                $array = array();
                for($i=0; $i<count($key); $i++){
                    if ((new self)->checkDateTime($key[$i])) {
                        array_push($array, (new self)->getDate($key[$i]));
                    }else array_push($array, $key[$i]);
                }

                $request[$req] = $array;
            }
        }
        return $request;
    }

    // -------------------------------------------------------------------------------------------------------------- //
    /*
     *  Response messages -- success or failed
     */
    public static function success($url, $message = 'Uspješno ažurirano !'){
        self::$_response['url'] = $url;
        self::$_response['message'] = $message;
        return self::$_response;
    }

    public static function error($code, $sqlMessage){
        self::$_response['code'] = $code;
        self::$_response['sql'] = $sqlMessage;
        self::$_response['message'] = 'Desila se greška, molimo pokušajte ponovo!';
        return self::$_response;
    }

    /*
     *  Api responses structure
     */
    public static function apiSuccess($message, $uri, $data = null){
        self::$_response['uri'] = $uri;
        self::$_response['message'] = $message;
        self::$_response['data'] = $data;

        return json_encode(self::$_response);
    }
    public static function apiError($code, $message, $uri = null, $data = null){
        self::$_response['code'] = $code;
        self::$_response['uri'] = $uri;
        self::$_response['message'] = $message;
        self::$_response['data'] = $data;

        return json_encode(self::$_response);
    }
}
