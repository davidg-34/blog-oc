<?php

namespace App\Models;

class User extends Database {
    
    public static function insertRegister(/* string $lastname, string $email, string $password */) {
        if(isset($_POST['lastname'])
            AND ($_POST['email'])
                AND ($_POST['password'])){
                    $lastname=$_POST['lastname'];
                        $email=$_POST['email'];
                            $password=$_POST['password'];            
            }else{
            echo "Error";
            //die();
            }
        
         // Insertion des données du formulaire inscription  dans la BDD
         $results = self::$db -> prepare ('INSERT INTO users (lastname, email, password) VALUES (?, ?, ?)') ;
         /* $userRegister =  */$results -> execute ([
            $lastname  = "Jeann", 
            $email  = "jj@gmail.com", 
            $password  = "mdp2" 
         ]);
         /* return ($userRegister); */
    }   

}
/* function createComment(string $post, string $author, string $comment)
{
	$database = commentDbConnect();
	$statement = $database->prepare(
    	'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
	);
	$affectedLines = $statement->execute([$post, $author, $comment]);

	return ($affectedLines > 0);
} */
