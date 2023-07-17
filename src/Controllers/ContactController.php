<?php

namespace App\Controllers;

class ContactController extends Controller{
    public function index(){
        if (count($_POST)) {             
            $request = new \App\Request();
            $firstname = $request->getParam("firstname");
            $lastname = $request->getParam("lastname");
            $email = $request->getParam("email");
            $message =  $request->getParam("message");

            /* $mail = \App\ */
            // POURQUOI DANS REGISTER IL Y A HEADER() + RENDER ?????
            /* header("Location: /blogMvc/contact");  
            die; */
        }
        $this->render('contact.html.twig');
    }
}

    

