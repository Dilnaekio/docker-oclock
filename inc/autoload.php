<?php

/**
 * ! AUTOLOADING des classes (PSR-4)
 * 
 * Fonction pour inclure les fichiers contenant les classes
 * Que si besoin lors de l'exécution
 * grace au "use + fqcn"
 * 
 * 
 * 
 */
spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filename = dirname(__DIR__) . DIRECTORY_SEPARATOR . $className . '.php';

    if (is_readable($filename)) {
        // déclenche le require_once que si il y a un "use +fqcn" au cours de l'exécution
        require_once($filename);
    }
});