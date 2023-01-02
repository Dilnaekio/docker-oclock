<?php

// espace de nom : App\Models
namespace App\Models;

// pour utiliser une autre classe, on l'appelle avec use + FQCN
use App\Utils\DB;


/**
 ** Classe Modèle qui va communiquer avec la table editors de notre BDD
 * FQCN : App\Models\Editor
 * chemin physique : App/Models/Editor.php
 */
class Editor extends CoreModel
{
    public $name;
    public $presentation;

    static public function findById(int $id) {
        // on récupère notre connexion PDO
        $pdoDBConnexion = DB::getPdo();
        

        // requête SQL pour récupérer toutes les lignes de notre table
        $sql = "SELECT * FROM `editors` WHERE id = " . $id ;

        // exécuter notre requete SQL
        $pdoStatement = $pdoDBConnexion->query($sql);

        // lire et renvoyer tous les résultats sous forme d'objet Editor
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);
        return $pdoStatement->fetch();
    }

    static public function findAll() {
        // on récupère notre connexion PDO
        $pdoDBConnexion = DB::getPdo();
        
        // requête SQL pour récupérer toutes les lignes de notre table
        $sql = "SELECT * FROM `editors` ORDER BY `name`" ;

        // exécuter notre requete SQL
        $pdoStatement = $pdoDBConnexion->query($sql);

        // lire et renvoyer tous les résultats sous forme de tableau d'objet
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save() {
        //todo
    }
}