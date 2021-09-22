<?php

namespace src\handlers;


use src\models\User;
use src\models\UserRelation;

class UserHandler
{
    public static function checkLogin()
    {
        if(!empty($_SESSION['token'])){
            $token =$_SESSION['token'];
            $data = User::select()->where('token', $token)->one();
            if(count($data) > 0 ){
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->email = $data['email'];
                $loggedUser->name = $data['name'];
                $loggedUser->birthdate = $data['birthdate'];
                $loggedUser->city = $data['city'];
                $loggedUser->work = $data['work'];
                $loggedUser->avatar = $data['avatar'];

                return $loggedUser;
            }
        }

        return False;
    }

    public function verifyLogin($email, $password)
    {
        $user = User::select()->where('email', $email)->one();
        if($user){
            if(password_verify($password, $user['password'])){
                $token = md5(time().rand(0,9999).time());
                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();

                return $token;
            }
        }
        return false;
    }

    public static function idExists($id)
    {
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }

    public static function emailExists($email)
    {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function getUser($id, $full = false)
    {
        $data = User::select()->where('id', $id)->one();
        if($data){
            $user = new User();
            $user->id = $data['id'];
            $user->email = $data['email'];
            $user->name = $data['name'];
            $user->birthdate = $data['birthdate'];
            $user->city = $data['city'];
            $user->work = $data['work'];
            $user->avatar = $data['avatar'];
            $user->cover = $data['cover'];

            if($full){
                $user->followers = [];
                $user->following = [];
                $user->photos = [];

//                followers
                $followers = UserRelation::select()->where('user_to', $id)->get();
                foreach ($followers as $follower){

                    $userData = User::select()->where('id', $follower['user_from'])->one();

                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];

                    $user->followers[] = $newUser;
                }

//                following
                $following = UserRelation::select()->where('user_from', $id)->get();
                foreach ($following as $follower){

                    $userData = User::select()->where('id', $follower['user_to'])->one();

                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];

                    $user->following[] = $newUser;
                }

//                photos
                $user->photos = $photos = PostHandler::getPhotosFrom($id);


            }

            return $user;
        }

        return false;
    }

    public function addUser($name, $email, $password, $birthdate)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());
        User::insert([
            'email' => $email,
            'password' => $hash,
            'name' => $name,
            'birthdate' => $birthdate,
            'token' => $token
        ])->execute();

        return $token;
    }

    public static function updateUser($array)
    {
        if($array['pswd1']){
            $hash = password_hash($array['pswd1'], PASSWORD_DEFAULT);
            User::update()
                ->set([
                    'name' => $array['name'],
                    'email' => $array['email'],
                    'birthdate' => $array['birthdate'],
                    'city' => $array['city'],
                    'work' => $array['work'],
                    'password' => $hash
                ])
                ->where('id', $array['id'])
                ->execute();

            if($array['avatar'] || $array['cover']){
                self::updateImage($array);
            }


            return true;

        }else {
            User::update()
                ->set([
                    'name' => $array['name'],
                    'email' => $array['email'],
                    'birthdate' => $array['birthdate'],
                    'city' => $array['city'],
                    'work' => $array['work']
                ])
                ->where('id', $array['id'])
                ->execute();

            if(isset($array['avatar'])){
                self::updateAvatar($array);
            }

            if(isset($array['cover'])){
                self::updateCover($array);
            }
        }

        return false;
    }

    private static function updateAvatar($array)
    {
        if(isset($array['avatar'])){
            User::update()->set('avatar', $array['avatar'])->where('id', $array['id'])->execute();
        }
    }

    private function updateCover($array)
    {
        if($array['cover']){
            User::update()->set('cover', $array['cover'])->where('id', $array['id'])->execute();
        }
    }

    public static function isFollowing($from, $to)
    {
        $data = UserRelation::select()
            ->where('user_from', $from)
            ->where('user_to', $to)
        ->one();

        if($data){
            return true;
        }

        return false;
    }

    public static function follow($from, $to)
    {
        UserRelation::insert([
            'user_from' => $from,
            'user_to' => $to
        ])->execute();
    }

    public static function unfollow($from, $to)
    {
        UserRelation::delete()
            ->where('user_from', $from)
            ->where('user_to', $to)
        ->execute();
    }

    public static function searchUser($term)
    {
        $users = [];
        $data = User::select()->where('name', 'like', '%'.$term.'%')->get();

        if($data){
            foreach ($data as $user){

                $newUser = new User();
                $newUser->id = $user['id'];
                $newUser->name = $user['name'];
                $newUser->avatar = $user['avatar'];

                $users[] = $newUser;
            }
        }

        return $users;
    }
}