<?php
namespace App\Controllers;

abstract class CoreController {


    
    /**
     * récupère le nom du template et un tableau de données à insérer
     * toutes les classes qui hériteront de CoreController pourront utiliser cette méthode
     *
     * @param string $template
     * @param array $data
     * @return void
     */
    protected function render($template, $data = []){

        // construction du chemin vers le template
        //? https://www.php.net/manual/fr/language.constants.magic.php
        $templateFile = __DIR__ . "/../../views/" . $template;

        // si le fichier n'existe pas, on lève une exception
        if (!is_file($templateFile)) {
            throw new \Exception('Le template n\'existe pas');
        }

        //? https://www.php.net/manual/fr/function.extract
        // extraction des données du tableau $data
        // cela permet d'obtenir des variables locales
        // qui deviennent dispo dans le fichier inclut ci-dessous
        extract($data);

        include $templateFile;
    }
}