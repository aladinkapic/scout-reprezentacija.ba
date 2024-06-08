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

    protected function curl_get_file_contents($URL){
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }

    protected function fetchAndSave($uri, $path, $name): bool{
        try{

            // $fileContent = file_get_contents($uri);
            $fileContent = $this->curl_get_file_contents($uri);

            file_put_contents($path . $name, $fileContent);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }
}
