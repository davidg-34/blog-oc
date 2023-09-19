<?php

namespace App\Controllers;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once 'vendor/autoload.php';


class ContactController extends Controller{
    public function index(){
        if ($this->request->hasParams()) {
            $firstname = $this->request->getParam("firstname");
            $lastname = $this->request->getParam("lastname");
            $email = $this->request->getParam("email");
            $message =  $this->request->getParam("message");
            // TO DO gestion d'erreur
            if (false) {
                return "error";
            }
            $this->sendContactMail($email, $firstname, $lastname, $message);
        }
        $this->render('contact.html.twig');
    }

    private function sendContactMail($email, $firstname, $lastname, $message) {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = false;                                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'david.guion.web@gmail.com';            //SMTP username
            $mail->Password   = 'oufxalgnhnalzgkt';                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom('david.guion.web@gmail.com', 'Blog de David');
            $mail->addAddress('david.guion.web@gmail.com', $firstname. ' ' . $lastname);     //Add a recipient

            // Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = 'Message de contact sur le blog';
            $mail->Body    = 'Message réçu de<br>Nom : ' . $firstname . ' ' . $lastname .'<br>Email : ' . $email . '<br>Message : ' . $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            print_r("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }


    }
}






