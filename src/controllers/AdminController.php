<?php

namespace src\controllers;

use \core\Controller;
use src\models\User;
use src\models\Backup;

class AdminController extends Controller
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

    public function backup()
    {   
       $backup = Backup::getAllBackup();

        $this->render('backup', [
            'loggedUser' => $this->loggedUser,
            'backup' => $backup
        ]);
    }

    public function addBackup(){

        $backup = Backup::backup();              

        $this->redirect('/backup');
    }

    public function deleteBackup($id)
    {
        $name = Backup::deleteBackup($id);
        
        if(file_exists('storage/backup/'.$name)){
            unlink('storage/backup/'.$name);
        }
                
       $this->redirect('/backup');
    }
}