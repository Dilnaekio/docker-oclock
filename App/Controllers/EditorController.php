<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Editor;

class EditorController
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
        $allEditors = Editor::findAll();

        // charge la liste des jeux
        $allGames = Product::findAll();

        // construction du chemin vers la VUE (view)
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/editor/all.tpl.php";

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        // j'affiche la vue
        include $templateFile;
    }
}
