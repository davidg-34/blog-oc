<?php

namespace App\Controllers;

class RegisterController extends Controller {
    
    // Méthode 
    public function index() { 
        $users = \App\Models\User::insertRegister(); //$_POST['lastname'], $_POST['email'], $_POST['password']
        echo '<pre>';
         print_r($users);
        echo '</pre>';
        //die();
        //if (count($_POST)) { 
            //$params = [
                //'user' => $users
                //"lastname" => $lastname, 
                //"email" => $email,
                //"password" => $password
            //];
        //}
        $this->render('register.html.twig', /* $params */);                    
    }
    

    /* public function register($lastname, $email, $password) {
        $registration = \App\Models\User::insertRegister($_POST['lastname'], $_POST['email'], $_POST['password'], $lastname, $email, $password, 21); 
        return $registration;     
    } */
    //appeler la methode qui permet d’enregistrer le user dans la bdd
    ////////**************************************************** */   

}