<?php

// import de la fonction qui va faire l'autoloading des fichiers
include '../inc/autoload.php';

// import du fichier de configuration
include '../config.php';

echo "<h1>Hello oPlaystore</h1>";

echo "Page consultée : " . $_SERVER['REQUEST_URI'];