<?php
namespace App\Controllers;

use League\Plates\Engine;
use App\Utils\Loggerbis;

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

        // Create new Plates instance
        $templates = new Engine(__DIR__ . "/../../views/");

        //Loggerbis::log("Appel du template" . $template);

        // Render a template
        echo $templates->render($template, $data);
    }
}