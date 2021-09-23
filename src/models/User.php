<?php

namespace src\models;


use core\Model;

class User extends Model
{
    public static function checkLogin($token)
    {
        return self::select()->where('token', $token)->one();
    }

    public static function getUser($email)
    {
        return self::select()->where('email', $email)->one();        
    }

    public static function updateToken($email) 
    {
        $token = md5(time().rand(0,9999).time());
        self::update()->set('token', $token)->where('email', $email)->execute();        
        return $token;
    }

    public static function updateIp($ip , $email)
    {
        self::update()->set('ip', $ip)->where('email', $email)->execute();
    }
}