<?php

//! FRONT CONTROLLER
// rôle sécurise l'archi MVC
// récupère les requetes HTTP entrantes
// puisqu'on a démarré le serveur PHP :
// php -S 0.0.0.0:8080 -t public/
//? 0.0.0.0:8080 => public/ (sous-entendu public/index.php)

//* import de l'autoload de composer qui va faire l'autoloading des fichiers de classes de notre App mais aussi des classes des dépendances
include '../vendor/autoload.php';

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
d($infoUrl);

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

        case '/games':
            // Page avec tous les jeux
            $product = new \App\Controllers\ProductController();
            $product->all();
            break;

        case '/categories':
            // Page qui affiche toutes les catégories et produits associés
            $category = new \App\Controllers\CategoryController();
            $category->all();
            break;

        // url : http://nom-domaine/category?id=3
        case '/category':
            // Page qui affiche tous les produits d'une catégorie
            $category = new \App\Controllers\CategoryController();
            $category->detail($_GET["id"]);
            break;

        case '/editors':
            // Page qui affiche tous les éditeurs et produits associés
            $editor = new \App\Controllers\EditorController();
            $editor->all();
            break;

        //todo
        //case '/editor':
            // Page qui affiche tous les éditeurs et produits associés
            

        // si le chemin n'est pas autorisé
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