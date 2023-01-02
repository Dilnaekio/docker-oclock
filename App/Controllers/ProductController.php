<?php

namespace App\Controllers;

class ProductController
{
    /**
     * méthode show pour afficher la fiche d'un seul produit
     * Request_uri => /product
     *
     * @param integer $id
     * @return void
     */
    public function show($id)
    {

        // plan d'action
        // 1. chercher les données du produit ===> MODEL
        // 2. chercher le html pour afficher les données du produit ===> VIEW

        $product = \App\Models\Product::findById($id);

        if (!$product) {
            // lève une exception si l'id de produit de correspond à aucun produit dans la BDD
            throw new \Exception('Produit inexistant');
        }

        // construction du chemin vers la VUE (view)
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/product/show.tpl.php";

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        // j'affiche la vue
        include $templateFile;
    }

    /**
     * méthode pour afficher la liste de tous les produits
     *
     * @return void
     */
    public function all()
    {

        // On cherche toutes les données de tous les produits
        // on exécute la méthode findAll() du model Product
        $allGames = \App\Models\Product::findAll();

        // construction du chemin vers la VUE (view)
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/product/all.tpl.php";

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        // j'affiche la vue
        include $templateFile;
    }
}
