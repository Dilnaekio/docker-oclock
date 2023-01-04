<?php

// espace de nom : App\Models
namespace App\Models;

// pour utiliser une autre classe, on l'appelle avec use + FQCN
use App\Utils\DB;


/**
 ** Classe Modèle qui va communiquer avec la table products de notre BDD
 * FQCN : App\Models\Product
 * chemin physique : App/Models/Product.php
 */
class Product extends CoreModel
{

    //* hérité de CoreModel :
    /* protected $id */

    //* hérité de CoreModel : 
    /* public function setId($id) {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    } */

    //* les propriétés correspondent aux champs de la table product
    public $id_category; // clé étrangère: 1 produit appartient à 1 catégorie
    public $category_name;
    public $id_editor; // clé étrangère : 1 produit appartient à 1 éditeur
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

    /**
     * Récupère tous les produits appartenant à une catégorie dont l'id est transmis
     *
     * @param $id_category
     * @return array
     * 
     */
    static public function productsByCategory($id_category) {
        // on récupérer notre connexion PDO
        $pdoDBConnexion = DB::getPdo();

        // requête SQL pour récupérer toutes les lignes de notre table
        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        WHERE id_category = {$id_category}
        ORDER BY `title`
        " ;

        // exécuter notre requete SQL
        $pdoStatement = $pdoDBConnexion->query($sql);

        // lire tous les résultats
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    /**
     * Récupère tous les produits appartenant à un éditeur dont l'id est transmis
     *
     * @param $id_editor
     */
    static public function productsByEditor($id_editor) {
        // on récupérer notre connexion PDO
        $pdoDBConnexion = DB::getPdo();

        // requête SQL pour récupérer toutes les lignes de notre table
        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        WHERE id_editor = {$id_editor}
        ORDER BY `title`
        " ;

        // exécuter notre requete SQL
        $pdoStatement = $pdoDBConnexion->query($sql);

        // lire tous les résultats
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save() {
        //todo
    }
}