<?php

namespace src\controllers;

use \core\Controller;
use src\Config;
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

    public function usuario()
    {
        $getUser = User::getAllUser();        
        $this->render('user',[
            'loggedUser' => $this->loggedUser,
            'getUser' => $getUser
        ]);
    }

    public function backup()
    {
        if(!is_dir("../".Config::DB_BACKUP)){
            
            mkdir('../' . Config::DB_BACKUP);
            chmod('../' . Config::DB_BACKUP, 0777);            
        }        

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