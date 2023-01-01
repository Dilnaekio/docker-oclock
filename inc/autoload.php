<?php

/**
 * Fonction pour inclure les fichiers contenant les classes
 * 
 */
spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filename = dirname(__DIR__) . DIRECTORY_SEPARATOR . $className . '.php';

    if (is_readable($filename)) {
        require_once($filename);
    }
});