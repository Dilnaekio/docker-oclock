<?php

namespace App\Controllers;

class HomeController {


    /**
     * méthode qui gère l'affichage de la HOME
     *
     * @return void
     */
    public function index() {

        // J'utilise la méthode statique findAll() du modèle Product pour récupérer les données de tous les jeux stockées en BDD
        $allProducts = \App\Models\Product::findAll();

        $allCategories = \App\Models\Category::findAll();

        $allEditors = \App\Models\Editor::findAll();

        // construction du chemin vers la VUE (view)
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/home/index.tpl.php";

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        // j'affiche la vue
        include $templateFile;
    }
}