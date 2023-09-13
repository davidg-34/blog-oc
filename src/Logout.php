<?php

namespace App;

class Logout {
    Public function index(){

            if ($session->has("userId")) {  // Si l'utilisateur est déjà inscrit

                //if (array_key_exists($_SESSION[$key])){  // Si la session est en cours
                $key = filter_input(INPUT_SESSION, $key, FILTER_SANITIZE_STRING);
                   if (array_key_exists($key, $_SESSION)){                     
                   // Supprimer les sessions
                   unset($_SESSION['userId']);
                   unset($_SESSION['userEmail']);
                   //unset($_SESSION['userName']);
                   unset($_SESSION['userUsername']);
       
                   header('Location: /blogMvc/'); // Retour page accueil
                }
            }    
        }     
}
   



