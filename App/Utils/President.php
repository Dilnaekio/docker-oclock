<?php

namespace App\Utils;

/**
 * Le minimum pour mettre en place le patron de conception singleton
 * - un constructeur privé
 * - une propriété privée (statique) qui va contenir l'instance
 * - une méthode statique qui va checker si l'instance existe déjà avant de la retourner
 */

class President {

    private static $_instance = null;
    private $nom;

    /**
     * Constructeur de la classe
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
            self::$_instance = new President($nouveauNom);
        }

        return self::$_instance;
    }

    public function sayHisName() {
        echo "Je m'appelle {$this->nom}";
    }
}