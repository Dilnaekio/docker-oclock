<?php

namespace App\Controllers;

class ProductController {


    public function show($id) {
         echo "affichera du html pour le détail du produit " . $id;

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
}