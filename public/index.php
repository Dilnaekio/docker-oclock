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

//* Utilisation de Symfony Routing pour gérer les requêtes HTTP entrantes

// import de la collection des routes
include '../App/Routes/web.php';

// import pour la gestion des routes
use Symfony\Component\Routing\RequestContext; // récupérer la req HTTP
use Symfony\Component\Routing\Matcher\UrlMatcher; // compare la req HTTP avec la collec de routes
use Symfony\Component\Routing\Generator\UrlGenerator; // permet de créer des urls

//* 1. récupérer la requête 
// récupération de la requête HTTP courante 
// équivaut à la récupération du $_SERVER['REQUEST_URI']
$context = new RequestContext();

try {
    // 2. vérifier que la req HTTP matche avec nos routes prédéfinies (dans web.php)
    $matcher = new UrlMatcher($routes, $context);
    
    // 3. on donne à l'urlMatcher le chemin + param de la requête HTTP courant
    $result = $matcher->match($_SERVER['REQUEST_URI']);
    
    // 4. on stocke des chaines de caractères dans ces deux variables
    $controllerName = $result['_controller']; 
    $controllerMethod = $result['_method'];

    // 5. on instancie alors le controleur correspondant 
    $controllerInstance = new $controllerName();
    // 6. on exécute la méthode correspondante
    $controllerInstance->$controllerMethod($result['id'] ?? null);


    ### Null Coalescent

   // $result['id'] ?? null

   // équivaut à :

   /*
    if (isset($result['id'])) {
        return $result['id]
    }
    else {
        return null
    }
   */

}
catch (\Exception $e) {
    echo "<pre>";
    echo "Erreur sur le site : " . $e->getMessage() ;
    echo "</pre>";
    exit();
}