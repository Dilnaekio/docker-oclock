## PHP

### Portée des variables

à l'intérieur d'une fonction ou d'une méthode, nous n'avons accès qu'aux variables déclarées à l'intérieur de cette fonction/méthode.

### Gestionnaire de dépendances

composer équivalent à npm
packagist.org équivalent à npmjs.com
dossier vendor équivalent à node_modules
composer.json équivalent à package.json

#### Composer

1. gitignore : vendor
2. include de l'autoload.php (de composer) dans le frontcontroller
3. ajout de autoload dans composer.json : https://getcomposer.org/doc/01-basic-usage.md#autoloading
4. a la racine du projet : composer dump-autoload pour regénérer le fichier autoload.php