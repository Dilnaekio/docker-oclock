<?php

// Nous allons définir la liste des routes de notre site en utilisant les outils fournis par Symfony/Routing

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


// On va créer une collection de routes
$routes = new RouteCollection();

// on demande la home
/* 
case "/":
    $controller = new HomeController();
    $controller->index();
    break; 
*/
// Avec symfony/routing, cela équivaut à : 
$route = new Route('/',        // chemin
                    [
                        '_controller' => App\Controllers\HomeController::class,
                        '_method' => 'index'
                    ]);

// on ajoute la route fraichement instanciée dans la collection
$routes->add('home', $route);

// on demande la liste de tous les jeux
/*
case '/games':
    $product = new \App\Controllers\ProductController();
    $product->all();
    break;
*/
$route = new Route('/games', 
    [
        '_controller' => App\Controllers\ProductController::class,
        '_method' => 'all'
    ]
);
$route->setMethods('GET');
$routes->add('games', $route);

//* Page qui affiche toutes les catégories et produits associés
$route = new Route('/categories', 
    [
        '_controller' => App\Controllers\CategoryController::class,
        '_method' => 'all'
    ]
);
$route->setMethods('GET');
$routes->add('categories', $route);

//* Page qui affiche tous les éditeurs et produits associés
$route = new Route('/editors', 
    [
        '_controller' => App\Controllers\EditorController::class,
        '_method' => 'all'
    ]
);
$route->setMethods('GET');
$routes->add('editors', $route);


//? Et les chemins avec des paramètres ??

//* fiche produit
// chemin : /product/2 
//// ancien chemin : /product?id=2
$route = new Route('/product/{id}',
    [
        '_controller' => App\Controllers\ProductController::class,
        '_method' => 'show'
    ]
);
$route->setMethods('GET');
$routes->add('product', $route);

