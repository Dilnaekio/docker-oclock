<?php

namespace App\Controllers;

class ProductController extends CoreController
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

        $data['product'] = \App\Models\Product::findById($id);

        if (!$data['product']) {
            // lève une exception si l'id de produit de correspond à aucun produit dans la BDD
            throw new \Exception('Produit inexistant');
        }

        $data['title'] = $data['product']->title;

        $this->render('product/show.tpl', $data);
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
        $data['allGames'] = \App\Models\Product::findAll();

        $data['title'] = "Tous les jeux";

        $this->render('product/all.tpl', $data);
    }
}
