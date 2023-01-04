# Jour 1


## PHP

### self::class

permet de récupérer le FQCN de la classe dans laquelle on se trouve

### parse_url

https://www.php.net/manual/en/function.parse-url

### Null coalescent

https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op

    ### Null Coalescent

   // $result['id'] ?? null

   // équivaut à :

   /*
    if (isset($result['id'])) {
        return $result['id]
    }
    else {
        return null
    }
   */

### Les espaces de nom

[les Namespaces ou espace de noms](https://kourou.oclock.io/ressources/fiche-recap/namespaces/)


#### Namespace et PSR4

Ce qu'on recherche à faire ? Charger les fichiers source de nos classes sans avoir besoin de faire de require pour chacun d'eux.
Un simple "use" doit permettre de charger seulement la source nécessaire, et pas toutes les sources par défaut.

La solution :

[PSR4 : Autoloader](https://www.php-fig.org/psr/psr-4/)




## MVC

### Model

- namespace spécifique pour tous nos modèles : App\Models;
- En PhP, on a pas d'ORM (object relational Mapping) natif, on a juste PDO.

Si on veut un ORM, il faut aller chercher des librairies PHP comme Doctrine (Datamapper) ou Eloquent (Active Record).

> du coup les classes Modèles Category, Product, Editor nous permette de faire un petit ORM.

un model = une table de la BDD
les propriétés = les colonnes de la table

### Controller

- namespace spécifique pour tous nos controleurs : App\Controllers;

- Nos controleurs vont avoir comme rôle d'exécuter TOUT le code nécessaire pour renvoyer une réponse HTTP à celui qui a envoyée la requête HTTP.

Chaque méthode de chaque controller va correspondre à une URI

[Schema URI-URL-URN](https://cdn.jsdelivr.net/gh/b0xt/sobyte-images/2022/01/12/6b52f756579c4672be21df90ea82f259.png)