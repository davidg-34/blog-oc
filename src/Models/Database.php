<?php

/* namespace App\Models;

class Database {

    protected static $db;

    public static function initDatabase() {
        if (self::$db != null) return;
        try {
            self::$db = new \PDO('mysql:host=localhost;dbname=oc-david-p5;charset=utf8', 'root');
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {

        }
    }
}
 */

 namespace App\Models;
 
 class Database {
 
     protected static $db;
 
     public static function initDatabase() {
         if (self::$db != null) return;
         try {
             self::$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
             self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
         } catch (\Exception $e) {
              
         }        
     }
 }
 