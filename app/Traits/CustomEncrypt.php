<?php

namespace App\Traits;


trait CustomEncrypt
{
    /**
     * create a custom encyrpt in laravel
     */
    public function encryptData($id)
    {
        //define time as key
        $time  = date('is');
        //deifne user crypted as key
        $key = env('USER_CRYPTED');
        //encode the  time and user key
        $keyTime = base64_encode($time);
        $localKey = base64_encode($key);
        //encode the parameter
        $idKey = base64_encode($id);
        //joining the key
        $token = $localKey . '-' . $idKey . '-' . $keyTime;
        //return as token key
        return base64_encode($token);
    }
    /**
     * create custom decrypt data
     */
    public function decryptData($token)
    {
        // exctarct the token parameter
        $extracToken = base64_decode($token);
        // expplode the token data
        $explodeSrtingToken = explode('-', $extracToken);
        //get key data
        $idKey = base64_decode($explodeSrtingToken[1]);
        //return key data
        return $idKey;
    }
}
