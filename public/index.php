<?php

//! FRONT CONTROLLER
// rôle sécurise l'archi MVC
// récupère les requetes HTTP entrantes
// puisqu'on a démarré le serveur PHP :
// php -S 0.0.0.0:8080 -t public/
//? 0.0.0.0:8080 => public/ (sous-entendu public/index.php)

//* import de la fonction qui va faire l'autoloading des fichiers de classes
include '../inc/autoload.php';

//* import du fichier de configuration (BDD)
include '../config.php';

//* On va lister toutes les requêtes autorisées de notre application
// Quand on recevra une requête, on va demander au FC de vérifier si c'est une requête valide
// Si oui : on va solliciter le controleur en charge de cette requête
// Si non : on peut renvoyer une erreur http 404

//* Gestion des requêtes
// ! DISPATCHER
$page = $_SERVER['REQUEST_URI'];

try {

    switch ($page) {

        //* afficher la home
        case "/":
            // on va instancier un controller
            $controller = new \App\Controllers\HomeController();
            // exécuter une de ses méthodes pour un affichage
            $controller->index();
            break;

        default:
            // lève une exception si la page n'existe pas
            throw new \Exception('Page inconnue');
            break;    
    }
}
catch (\Exception $e) {
    echo "<pre>";
    echo "Erreur sur le site : " . $e->getMessage() ;
    echo "</pre>";
    exit();
}