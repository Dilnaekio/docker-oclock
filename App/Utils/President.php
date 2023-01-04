<?php

namespace App\Utils;

/**
 * Le minimum pour mettre en place le patron de conception singleton
 * - un constructeur privé
 * - une propriété privée (statique) qui va contenir l'instance
 * - une méthode statique qui va checker si l'instance existe déjà avant de la retourner
 */

//? Pourquoi ré-éecrire le constructeur ?
// Pour spécifier qu'il doit rester privé, et éventuellement pour lui ajouter du code

class President {

    /**
     * static : pour pouvoir y accéder, même si aucune instance n'a encore été créée
     *
     * @var President|null
     */
    private static $_instance = null;

    /**
     * contient le nom du président actuel
     *
     * @var string
     */
    private $nom;

    /**
     * Constructeur de la classe President
     *
     * @param string $nom
     * @return void
     */
    private function __construct($nom) {
        $this->nom = $nom;  
    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @return President
     */
    public static function getInstance($nouveauNom) {

        if(is_null(self::$_instance)) {
            // self::$_instance signifie : je veux la valeur de la propriété de la classe dans laquelle je suis
            self::$_instance = new President($nouveauNom);
        }

        return self::$_instance;
    }

    public function sayHisName() {
        // $this->nom : je veux la valeur de la propriété de l'objet courant (instance courante de la classe)
        // ça signifie que pour obtenir $this->nom, il faut absolument avoir une instance de la classe (avoir fait un new President())
        return "Je m'appelle {$this->nom}";
    }
}

//? la différence entre self:: et $this->
// self:: correspond à la classe elle-même
// $this-> correspond à une instance de la classe