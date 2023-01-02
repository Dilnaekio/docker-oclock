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

$infoUrl =  parse_url($_SERVER['REQUEST_URI']);
//array(2) { ["path"]=> string(8) "/product" ["query"]=> string(4) "id=5" }

$page = $infoUrl['path'];

try {

    switch ($page) {

        //* afficher la home
        // http://localhost:8080/
        case "/":
            // on va instancier un controller
            $controller = new \App\Controllers\HomeController();
            // exécuter une de ses méthodes pour un affichage
            $controller->index();
            break;

        //* affiche la page détails d'un produit
        // http://localhost:8080/product?id={x}
        // {x} devra correspondre à un des id de produits stockés en BDD
        case "/product":

            // On vérifie que nous avons bien dans l'url un paramètre id
            if (!isset($_GET["id"])) {
                // lève une exception si la page n'existe pas
                throw new \Exception('Produit inexistant');
                break;
            }

            // conversion en entier de la valeur récupérée dans le paramètre d'url idi
            $id_product = (int)$_GET["id"];

            if ( $id_product === 0) {
                // lève une exception si la page n'existe pas
                throw new \Exception('Produit inexistant');
                break;
            }

            // instanciation d'un controller
            $controller = new \App\Controllers\ProductController();
            // exécution d'une méthode du controller
            $controller->show($id_product);
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