<?php

namespace App\Traits\API;

use App\User;

trait FilesTrait{
    /*
     *  Save image to public path; Arguments:
     *
     *      - uri (uri to image on web)
     *      - path (path to public or storage path in app)
     *      - name of file
     */

    protected function fetchAndSave($uri, $path, $name){
        try{
            $fileContent = file_get_contents($uri);
            file_put_contents($path . $name, $fileContent);
        }catch (\Exception $e){
            dd($e);
            return false;

        }

        return true;
    }
}
