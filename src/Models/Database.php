<?php

 namespace App\Models;

 class Database {

     protected static $db;

     public static function initDatabase() {
        require "./.env.php";
         if (self::$db != null) {
            return;
         }
         try {
             self::$db = new \PDO(
                'mysql:host=' . $config['database']['hostname'] . ';dbname=' . $config['database']['dbname'] . ';charset=utf8',
                $config['database']['username'], $config['database']['password']
            );
             self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
         } catch (\Exception $e) {
            print_r($e);
         }
     }
 }
