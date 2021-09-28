<?php

namespace src\models;


use core\Model;

class User extends Model
{
    public static function checkLogin()
    {
        if(!empty($_SESSION['token'])){
            $token =$_SESSION['token'];
            $data = self::select()->where('token', $token)->one();
            if($data){
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->email = $data['email'];
                $loggedUser->name = $data['name'];
                $loggedUser->token = $data['token'];
                // $loggedUser->birthdate = $data['birthdate'];
                // $loggedUser->city = $data['city'];
                // $loggedUser->work = $data['work'];
                // $loggedUser->avatar = $data['avatar'];

                return $loggedUser;
            }
        }
        return False;
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