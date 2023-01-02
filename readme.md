# oPlaystore

Nous allons apprendre à structurer un projet PHP à l'aide d'une architecture MVC.

Pour ce projet, nous lancerons le serveur web intégré à PHP avec cette commande :

```sh
php -S 0.0.0.0:8080 -t public/
```
Il faut se placer à la racine du répertoire du projet.

Puis dans le navigateur, il faut utiliser l'url de sa VM en ajoutant `:8080`.


## Import & configuration

1) Créer une base de données : `oPlaystore` 
2) Importer le fichier `doc/oPlaystore.sql`
3) Modifier le fichier `config.php` pour y mettre les bons paramètres

# oPlaystore

Nous allons apprendre à structurer un projet PHP à l'aide d'une architecture MVC.

Pour ce projet, nous lancerons le serveur web intégré à PHP avec cette commande :

```sh
php -S 0.0.0.0:8080 -t public/
```

Il faut se placer à la racine du répertoire du projet, puis dans le navigateur, il faut utiliser l'url de sa VM en ajoutant `:8080`

La semaine dernière, on avait pas besoin de taper le port au bout de notre url. C'était pas défaut le port `:80`.

Cette semaine, nous utilisons le _serveur de développement interne de PHP_. Donc pour éviter les conflits de port, on utilise un autre port que `:80` qui est celui de Apache.

## Import & configuration

1) Créer une base de données : `oPlaystore`
2) Importer le fichier `doc/oPlaystore.sql`
3) Modifier le fichier `config.php` pour y mettre les bons paramètres

![mcd oplaystore](doc/oplaystore.svg)

- Un produit a au minimum un éditeur et une catégorie
- Un produit a au maximum un éditeur et une catégorie
- Un éditeur a au minimum aucun produit
- Un éditeur a au maximum plusieurs produits
- Une catégorie a au minimum aucun produit
- Une catégorie a au maximum plusieurs produits

## Explorer le projet

Fichiers à inspecter :
- inc/autoload.php : sert à charger les fichiers de classes quand nécessaire en suivant la PSR-4
- public/index.php : est exécuté en premier lorsqu'il y a une requête HTTP envoyée au serveur WEB -> Front controller
- App/Utils/DB.php : crée une connexion PDO à la BDD et la sauvegarde dans une variable
- App/Models/CoreModel.php : réunit le code commun des autres classes modèles, elle est abstraite, donc on ne pourra jamais l'instancier
- App/Models/Category.php: classe modèle qui permet de faire des requêtes sur la table oplaystore.categories
- App/Models/Editor.php : classe modèle qui permet de faire des requêtes sur la table oplaystore.editors
- App/Models/Product.php : classe modèle qui permet de faire des requêtes sur la table oplaystore.products

### Model

- namespace spécifique pour tous nos modèles : App\Models;
- En PhP, on a pas d'ORM (object relational Mapping) natif, on a juste PDO.

Si on veut un ORM, il faut aller chercher des librairies PHP comme Doctrine (Datamapper) ou Eloquent (Active Record).

> du coup les classes Modèles Category, Product, Editor nous permette de faire un petit ORM.

un model = une table de la BDD
les propriétés = les colonnes de la table

### Controller

- namespace spécifique pour tous nos controleurs : App\Controllers;

- Nos controleurs vont avoir comme rôle d'exécuter TOUT le code nécessaire pour renvoyer une réponse HTTP à celui qui a envoyée la requête

Chaque méthode de chaque controller va correspondre à une URI

[Schema URI-URL-URN](https://cdn.jsdelivr.net/gh/b0xt/sobyte-images/2022/01/12/6b52f756579c4672be21df90ea82f259.png)