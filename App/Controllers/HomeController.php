<?php

namespace App\Controllers;

use \App\Models\{Category, Product, Editor};


class HomeController extends CoreController
{


    /**
     * méthode qui gère l'affichage de la HOME
     *
     * @return void
     */
    public function index() {

        // J'utilise la méthode statique findAll() du modèle Product pour récupérer les données de tous les jeux stockées en BDD
        $data['allProducts'] = Product::findAll();

        $data['allCategories'] = Category::findAll();

        $data['allEditors'] = Editor::findAll();
        //? => ces trois variables sont disponibles dans index.tpl.php

        $data['title'] = "Accueil";

        $this->render('home/index.tpl', $data);
    }
}