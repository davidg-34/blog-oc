
# Projet N° 5 Créez votre premier blog en PHP

Dans le cadre du parcours "Développeur d'applications PHP/Symfony", ce projet est développé en orienté objet sans framework avec le style bootstrap via le cdn et un peu de javascript.

## Installation

1 : Cloner le repository

2 : Importer le fichier sql 'blog.sql' situé à la racine du prohet pour créer une base données dans le SGBD de MySQL.

3 : Créer un fichier .env.php à la racine du projet avec un script sous cette forme en y intégrant vos propres identifiants de connexion.
 $config = [
    "database" => [
        "hostname" => "localhost",
        "dbname" => "blog",
        "username" => " ",
        "password" => " "
    ]
];

4 : Modification du paramétrage formulaire de contact : Controllers/ContactConroller.php, dans le bloc 'try {', veillez à mofifier les informations pour y ajouter votre email.

5 : Création des utitilisateurs : Il suffit simplement de s'enregistrer avec le bouton 'inscription' et de confimer avec le bouton 'connexion' pour accéder à la page administrateur.
