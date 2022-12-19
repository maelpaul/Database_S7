# Projet de SGBD

Pour notre projet, nous avons utilisé le système de gestion de bases de données PostgreSQL et un serveur HTTP Apache 2.

## Créer la base de données et l'utilisateur

Il faut se connecter au serveur PostgreSQL, créer la base de données, créer l'utilisateur et lui accorder les droits:

    $ sudo -u postgres psql
    postgres=# CREATE DATABASE jeux_de_plateau;
    postgres=# CREATE USER moi WITH PASSWORD 'pass';
    postgres=# GRANT ALL PRIVILEGES ON DATABASE jeux_de_plateau TO moi;

Il faut ensuite modifier les attributs de l'utilisateur:

    postgres=# ALTER ROLE moi IN DATABASE jeux_de_plateau SET client_encoding TO 'utf8';
    postgres=# ALTER ROLE moi IN DATABASE jeux_de_plateau SET default_transaction_isolation TO 'read committed';
    postgres=# ALTER ROLE moi IN DATABASE jeux_de_plateau SET timezone TO 'UTC';

On peut enfin vérifier la création de la base de données et celle de l'utilisateur:

    postgres=# \l
    postgres=# \du

Pour se connecter à la base de données en tant qu'utilisateur, faire:

    $ psql -h localhost -p 5432 -U moi -d jeux_de_plateau

Pour quitter le serveur PostgreSQL, faire:

    postgres=# exit

## Exécuter le projet

Pour exécuter le projet, faire:

    $ ./make.sh argument

où "argument" est un mot défini dans le tableau ci-dessous:

| Argument | Action |
| :---------- |:----------|
| help | affiche l'aide |
| create | permet de créer la base de données vide |
| add_data | permet d'ajouter les données dans la base |
| select | permet d'exécuter les requêtes après avoir spécifié le nom du fichier à exécuter |
| update | permet d'exécuter les requêtes de mises à jour après avoir spécifié le nom du fichier à exécuter |
| clean | permet de supprimer la base de données |
| reset | effectue successivement clean, create et add_data |
| website | permet d'ouvrir le site web du projet (votre mot de passe peut être demandé) |

## Important

En cas de problèmes d'utilisation, vérifier le contenu du fichier mywebsite/connect.php ainsi que la macro PGPASSWORD dans le fichier make.sh.

## Auteurs

- Lanier Thibaut
- Lam Mathieu
- Mazière Léo-Paul
- Paul Maël
