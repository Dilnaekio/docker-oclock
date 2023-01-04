# Jour 3

## Singleton

## applications possibles

(Merci ChatGPT)

Gestion de la connexion à une base de données : le singleton permet de s'assurer qu'il n'y a qu'une seule instance de la connexion à la base de données, ce qui peut être utile pour éviter les problèmes de concurrence et de surcharge de la base de données.

Gestion du cache : le singleton peut être utilisé pour s'assurer qu'il n'y a qu'une seule instance du cache, ce qui peut être utile pour éviter les problèmes de concurrence et de mémoire lors de l'utilisation de grandes quantités de données.

Gestion de la configuration de l'application : le singleton peut être utilisé pour s'assurer qu'il n'y a qu'une seule instance des paramètres de configuration de l'application, ce qui peut être utile pour éviter les problèmes de concurrence et de confusion lors de la modification des paramètres.

Gestion de la session utilisateur : le singleton peut être utilisé pour s'assurer qu'il n'y a qu'une seule instance de la session utilisateur, ce qui peut être utile pour éviter les problèmes de concurrence et de sécurité lors de la gestion de plusieurs utilisateurs simultanément.

Gestion de la journalisation de l'application : le singleton peut être utilisé pour s'assurer qu'il n'y a qu'une seule instance du fichier de journalisation de l'application, ce qui peut être utile pour éviter les problèmes de concurrence et de confusion lors de la modification des entrées de journal.

## Apache 2

Jusqu'à maintenant, on a développé oplaystore grâce au serveur interne de développement de PHP.

```sh
php -S 0.0.0.0:8080 -t public/
```

On aimerait maintenant pouvoir faire fonctionner notre site grâce au serveur Apache2.

### Problème ?

Problème : notre site est dans un répertoire, et son front-controller est dans le répertoire public.

`http://localhost/promo-pegase/mvc.o-playstore-Marion-Oclock/public/`

Ceci n'est pas un chemin valide parmi nos routes.

### Solution

créer un fichier de configuration pour notre site

- cd /etc/apache2/sites-available
- sudo cp 000-default.conf oplaystore.conf
- sudo nano oplaystore.conf
- modifier `/var/www/html` par `/var/www/html/oplaystore/public` au niveau de DocumentRoot en utilisant les flèches pour se déplacer dans le fichier.
- enregistrer avec control+X
- sudo a2ensite oplaystore.conf
- sudo a2dissite 000-default.conf
- sudo a2enmod rewrite
- sudo service apache2 reload

en cas d'erreur, on peut aller consulter les logs de apache : 

nano /var/log/apache2/error.log


## Pour revenir comme avant

- sudo a2dissite oplaystore.conf
- sudo a2ensite 000-default.conf
- sudo service apache2 reload

