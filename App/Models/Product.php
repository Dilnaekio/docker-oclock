<?php

//! Modèle Product
// Pour chaque table de la BDD, on fera une classe modèle


// espace de nom : App\Models
namespace App\Models;

// pour utiliser une autre classe, on l'appelle avec son FQCN
// Fully qualified class name
// Namespace + nom de classe
use App\Utils\DB;

class Product
{

    // les propriétés correspondent aux champs de la table product
    public $id_category;
    public $category_name;
    public $id_editor;
    public $editor_name;
    public $title;
    public $description;
    public $price;
    public $date_release;
    public $minimum_age;
    public $image;

    /**
     * Récupère les données d'un jeu
     *
     * @param integer $id
     * @return Product
     */
    static public function findById(int $id) {
        // on récupère notre connexion PDO
        $pdoDBConnexion = DB::getPdo();

        // requête SQL pour récupérer toutes les lignes de notre table
        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        WHERE products.id = " . $id ;

        // exécuter notre requete SQL
        $pdoStatement = $pdoDBConnexion->query($sql);

        // lire et renvoyer tous les résultats sous forme d'objet Product
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);
        return $pdoStatement->fetch();
    }

    /**
     * Récupérer tous les jeux
     *
     * @return array
     */
    static public function findAll() {
        // on récupère notre connexion PDO
        $pdoDBConnexion = DB::getPdo();
        
        // requête SQL pour récupérer toutes les lignes de notre table
        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        ORDER BY `title`" ;

        // exécuter notre requete SQL
        $pdoStatement = $pdoDBConnexion->query($sql);

        // lire et renvoyer tous les résultats sous forme de tableau d'objet
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save() {
        //todo
    }
}