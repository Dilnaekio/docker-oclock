# oPlaystore

Nous allons apprendre à structurer un projet PHP à l'aide d'une architecture MVC.

Pour ce projet, nous lancerons le serveur web intégré à PHP avec cette commande :

```sh
php -S 0.0.0.0:8080 -t public/
```

## Import & configuration

1) Créer une base de données : `oPlaystore` 
2) Importer le fichier `doc/oPlaystore.sql`
3) Modifier le fichier `config.php` pour y mettre les bons paramètres

## Explorer le projet

Fichiers à inspecter :
- inc/autoload.php
- public/index.php
- App/Utils/DB.php
- App/Models/CoreModel.php
- App/Models/Category.php
- App/Models/Editor.php
- App/Models/Product.php