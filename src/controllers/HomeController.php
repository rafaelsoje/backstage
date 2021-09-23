<?php

namespace src\controllers;

use \core\Controller;
use src\models\User;
use src\handlers\UserHandler;
use src\handlers\PostHandler;


class HomeController extends Controller
{

    private $loggedUser;
    private $token;

    public function __construct()
    {        
        if(!empty($_SESSION['token'])){

            $this->token = $_SESSION['token'];            
            $user = User::checkLogin($this->token);

            if($user){
                unset($user['password']);
                $this->loggedUser = $user;            
            }else{
                
                $_SESSION['flash'] = "Um novo login foi detectado.";
                $this->redirect('/login');
            }
        }else{

            $_SESSION['flash'] = "Sessão expirada.";
            $this->redirect('/login');

        }
    }

    public function index()
    {
        $this->render('home', [
            'loggedUser' => $this->loggedUser            
        ]);
    }
}