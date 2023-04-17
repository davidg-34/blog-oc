<?php

namespace App\Model;

try {

  $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDException $e)

{
  die('Erreur:'.$e->getMessage());
}
?>
