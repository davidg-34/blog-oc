<?php

namespace App\Models;

class User extends Database {
    
    // Fonction qui sélectionne/récupère l'email et le mdp de l'utilisateur 
    public static function authenticate($email, $password) {
        $user = self::$db->query("SELECT * FROM Users WHERE email = '" . $email . "' LIMIT 1");
        $tmp = $user->fetchAll();

        // Vérifie à l'aide d'un tampon que le mdp sélectionné/saisi par l'utilisateur existe dans la BDD 
        if (count($tmp)) {
            $user = $tmp[0];
            if (password_verify($password, $user['password'])) {
                // si le mdp est correct, il est initialisé et la variable est retournée
                return $user;
            }
            return null;
        }
        return null;
    }

    // Fonction pour l'inscription de l'utilisateur
    public static function create($username, $email, $password, $role) { 
        // Récupère dans la variable le mdp en mode hachage         
        $pwd = password_hash($password, PASSWORD_DEFAULT);   
        $statement = self::$db->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)') ;
        $statement->execute ([
            $username, 
            $email, 
            $pwd,
            $role
        ]);
        // Retourne la fonction avec le dernier enregistrement
        return self::$db->lastInsertId();         
    }   

}

