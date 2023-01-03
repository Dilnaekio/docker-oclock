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
}
