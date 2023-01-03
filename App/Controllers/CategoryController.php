<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;


class CategoryController extends CoreController
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
        $data['allCategories'] = Category::findAll();

        // charge la liste des jeux
        $data['allGames'] = Product::findAll();

        $data['title'] = "Tous les jeux triés par catégorie";

        $this->render('category/all.tpl', $data);
    }

    /**
     * gère l'affichage de tous les produits d'une catégorie
     *
     * @param integer $id
     * @return void
     */
    public function detail(int $id)
    {

        $toto = [];

        // récupération de la catégorie
        $toto['category'] = Category::findById($id);

        // récupération des produits de la catégorie
        $toto['allGames'] = Product::productsByCategory($id);

        $this->render('category/detail.tpl', $toto);
    }
}
