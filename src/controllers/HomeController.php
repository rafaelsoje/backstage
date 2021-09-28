<?php

namespace src\controllers;

use \core\Controller;
use src\models\User;
class HomeController extends Controller
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

    public function index()
    {   
        $this->render('home', [
            'loggedUser' => $this->loggedUser            
        ]);
    }
}