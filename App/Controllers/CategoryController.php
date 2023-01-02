<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;


class CategoryController
{
    /**
     * gère l'affichage de toutes les catégories et produits associés
     *
     * @return void
     */
    public function all()
    {
        $data = [];

        // charge la liste des catégories
        $allCategories = Category::findAll();

        // charge la liste des jeux
        $allGames = Product::findAll();

        // construction du chemin vers la VUE (view)
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/category/all.tpl.php";

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        // j'affiche la vue
        include $templateFile;
    }

    /**
     * gère l'affichage de tous les produits d'une catégorie
     *
     * @param integer $id
     * @return void
     */
    public function detail(int $id)
    {
        $data = [];

        // récupération de la catégorie
        $category = Category::findById($id);

        // récupération des produits de la catégorie
        $allGames = Product::productsByCategory($id);

        // construction du chemin vers la VUE (view)
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/category/detail.tpl.php";

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        // j'affiche la vue
        include $templateFile;
    }
}
