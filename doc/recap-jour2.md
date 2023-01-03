# Jour 2

## PHP

### Portée des variables

A l'intérieur d'une fonction ou d'une méthode, nous n'avons accès qu'aux variables déclarées à l'intérieur de cette fonction/méthode.

### Gestionnaire de dépendances

* __composer__ équivalent à __npm__
* __packagist.org__ équivalent à __npmjs.com__
* dossier __vendor__ équivalent à __node_modules__
* __composer.json__ équivalent à __package.json__

#### Composer

Ce que nous avons fait quand nous avons utiliser composer en tant que gestionnaire de dépendances dans notre projet : 

1. `gitignore` : ajout du dossier `vendor`
2. include de l'`autoload.php` (de composer) dans le _frontcontroller_
3. ajout de autoload de nos propres classes dans `composer.json` : https://getcomposer.org/doc/01-basic-usage.md#autoloading
4. à la racine du projet, dans le terminal : `composer dump-autoload` pour regénérer le fichier autoload.php

#### namespace, PSR 4 et Composer

- [PHP spl_autoload_register()](https://www.php.net/manual/fr/function.spl-autoload-register)
- [Doc Composer](https://getcomposer.org/doc/04-schema.md#autoload)


## Les routes

### qu'est-ce que c'est ?

Une route =>

- 1 chemin (la partie de l'URL débarassée de l'adresse du serveur ou nom de domaine)
- 1 méthode HTTP (GET, POST, PUT...)
- 1 méthode de controller
- 1 nom unique (optionnel)

Par exemple :

- /product/list
- GET
- ProductController::list()
- product-list

### Lister les routes

Quand on souhaite concevoir un nouveau site, on doit lister les routes qui seront mises à disposition des utilisateurs.

Listons les routes pour notre projet oPlaystore : 

#### Home

- /
- HomeController::index()
- GET

#### Page produit

- /product
- ProductController::show($_GET["id"])
- GET

#### Liste de tous les produits

- /games
- ProductController::all()
- GET

#### Liste des catégories avec les jeux associés

- /categories
- CategoryController::all()
- GET

#### Liste des éditeurs avec les jeux associés

- /editors
- EditorsController::all()
- GET

#### Liste les produits liés à une catégorie

- /category
- CategoryController::detail($_GET["id"])
- GET

#### Liste les produits liés à un éditeur

- /editor
- EditorsController::detail($_GET["id"])
- GET

#### C'est tout ?

Toutes les autres requêtes seront rejetées et renverront une exception.

### Le routage

On récupère l'URI de la requête HTTP, on extrait la partie qui varie pour ensuite exécuter une méthode d'un controlleur.

Un seul point d'entrée :

- ça va éviter que les internautes se promènent partout, surtout là où on veut pas
- ça va être plus simple à maintenir, puisque les URI accessibles sont toutes listées au même endroit
- associées aux URI accessibles, les méthodes de controller : le code est aussi très facile à retrouver

## Moteurs de template

### pourquoi ?

- maintenance plus efficiente
- plus de controle, permet la sécurisation des données affichées         (injection de code)
- réutilisation de morceaux de template (nesting)
- un système de layout, theming facilité

### quelles fonctionnalités ?

- Layout avec des sections
- Des fonctions utilitaires
- Boucles
- Conditions
- Nesting : insertion de template partiel
- Sécurisation des affichages