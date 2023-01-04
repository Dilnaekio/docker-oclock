<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Editor;

class EditorController extends CoreController
{
    /**
     * Controller qui gère l'affichage de tous les éditeurs et produits associés
     *
     * @return void
     */
    public function all()
    {
        $data = [];

        // charge la liste des editeurs
        $data['allEditors'] = Editor::findAll();

        // charge la liste des jeux
        $data['allGames'] = Product::findAll();

        $data['title'] = "Tous les jeux triés par éditeur";

        $this->render('editor/all.tpl', $data);
    }

    /**
     * gère l'affichage des produits associés à un éditeur
     *
     * @param integer $id
     * @return void
     */
    public function detail(int $id) {
        $data = [];

        // récupération de la catégorie
        $data['editor'] = Editor::findById($id);

        // récupération des produits de la catégorie
        $data['games'] = Product::productsByEditor($id);

        $data['title'] = "Tous les jeux de l'éditeur " . $data['editor']->name;

        // affichage du template
        $this->render('editor/detail.tpl', $data);
    }
}
