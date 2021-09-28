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
            $name = md5(time().rand(0,99)).'.sql';
            $dump->start($path.$name); 
            $size = round(($contents = filesize($path.$name) / 1024), 2);                       
          
            self::insert([
                'name' => $name,
                'path' => $path,
                'created_at' => date("Y-m-d H:i:s"),
                'size' => $size           
            ])->execute();
           
            $data = self::select()->get(); 
            
            return $data;            
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage(); 
            exit;           
        }
    }

    public static function getBackup()
    {
        return self::select()->get();
    }
}   