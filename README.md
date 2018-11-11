
Formation Perso. Symfony 4 - Gestion d'un site web pour une agence automobile

## Installation et Configuration

Clone le projet pour télécharger son contenu
```sh
$ git clone ...
```

Faites en sorte que Composer installe les dépendances du projet dans le répertoire vendor/
```sh
cd AgenceAuto/
composer install
```

Modifier le fichier .env dans lequel vous mettrez votre configuration sous la forme suivante : 

```sh
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```

Création de la base de données

```sh
php bin/console doctrine:database:create 
```

Utiliser le schéma doctrine pour générer les tables:

```sh
php bin/console doctrine:schema:update --force
```

Lancement du serveur :

```sh
php bin/console server:run
```



