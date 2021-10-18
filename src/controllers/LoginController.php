<?php

namespace src\controllers;


use core\Controller;
use src\handlers\UserHandler;
use src\models\User;

class LoginController extends Controller
{

    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function sigin()
    {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', [
            'flash' => $flash
        ]);
    }

    public function siginAction(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        if($email && $password){   
            
            $user = User::getUser($email);                        
            
            if($user){
                
                if(password_verify($password, $user['password'])){                    
                    $_SESSION['token'] = User::updateToken($email);                    
                    User::updateIp($this->get_client_ip(), $email);
                    $this->redirect('/');
                }
            }                    
        }
        $_SESSION['flash'] = "Usuário e/ou senha incorretos.";           
        $this->redirect('/login');
    }

    public function sigup()
    {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('sigup', [
            'flash' => $flash
        ]);
    }

    public function sigupAction()
    {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $birthdate = filter_input(INPUT_POST, 'birthdate');

        if($name && $email && $password && $birthdate){

            $birthdate = array_reverse(explode('/', $birthdate));

            if(count($birthdate) != 3) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/cadastro');
            }

            $birthdate = implode('/', $birthdate);

            if(strtotime($birthdate === false)){
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/cadastro');
            }

            if(UserHandler::emailExists($email) === false){
                $token = UserHandler::addUser($name, $email, $password, $birthdate);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }else{
                $_SESSION['flash'] = 'Email já cadastrado';
                $this->redirect('/cadastro');
            }

        }else{
            $this->redirect('/cadastro');
        }
    }

    public function recovery()
    {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('recovery', [
            'flash' => $flash
        ]);
    }

    public function recoveryAction()
    {
        
    }

    public function logout()
    {
        session_unset();
        $this->redirect('/login');
    }

}