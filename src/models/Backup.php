<?php

namespace src\models;

use ClanCats\Hydrahon\Query\Sql\Insert;
use core\Model;
use DateTime;
use src\Config;
use Ifsnop\Mysqldump as IMysqldump;

class Backup extends Model
{

    public static function backup()
    {       
        try {
            $dump = new IMysqldump\Mysqldump(Config::DB_DRIVER.":dbname=".Config::DB_DATABASE.";host=".Config::DB_HOST, Config::DB_USER, Config::DB_PASS);
            $path = 'storage/backup/';
            $name = 'backup-'.date("d-m-Y-H-i-s").'.sql';
            $dump->start($path.$name); 
            $size = round(($contents = filesize($path.$name) / 1024), 2);                       
          
            self::insert([
                'name' => $name,
                'path' => $path,
                'created_at' => date("Y-m-d H:i:s"),
                'size' => $size           
            ])->execute();

            return self::getAllBackup();
            
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage(); 
            exit;           
        }
    }

    public static function getAllBackup()
    {
        return self::select()->orderBy('id', 'desc')->get();
    }    

    public static function getBackup($id)
    {
        return self::select()->where('id', $id)->one();
    }

    public static function deleteBackup($id)
    {
        $data = self::getBackup($id);        
        self::delete()->where('id', $id)->execute();
        return $data['name'];
    }
}   