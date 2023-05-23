<?php

namespace App\Models;

class User extends Database {
    
    public static function authenticate($email, $password) {
        $user = self::$db->query("SELECT * FROM Users WHERE email = '" . $email . "' LIMIT 1");
        $tmp = $results->fetchAll();
        if (count($tmp)) {
            $user = $tmp[0];
            if (password_verify($password, $user['password'])) {
                return $user;
            }
            return null;
        }
        return null;
    }

    public static function create($lastname, $email, $password) {          
        $pwd = password_hash($password, PASSWORD_DEFAULT);   
        $statement = self::$db->prepare('INSERT INTO users (lastname, email, password) VALUES (?, ?, ?)') ;
        $statement->execute ([
            $lastname, 
            $email, 
            $pwd
        ]);
        return self::$db->lastInsertId();         
    }   

}

