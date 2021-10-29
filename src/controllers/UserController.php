<?php

namespace src\controllers;

use \core\Controller;
use src\Config;
use src\models\User;
use src\models\Backup;

class UserController extends Controller
{

    private $loggedUser;    

    public function __construct()
    {        
        $this->loggedUser = User::checkLogin();
        if(User::checkLogin() === false) {
            $_SESSION['flash'] = "Sessão expirada";
            $this->redirect('/login');
        }
    }

    public function perfil()
    {
        $this->render('perfil', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function usuario()
    {
        $getUser = User::getAllUser();        
        $this->render('user',[
            'loggedUser' => $this->loggedUser,
            'getUser' => $getUser
        ]);
    }

    public function formUser()
    {
        $this->render('adduser', [
            'loggedUser' => $this->loggedUser            
        ]);
    }

    public function addUser()
    {

    }
}