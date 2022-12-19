#!/bin/bash

export PGPASSWORD="pass"

if [ $# -eq 0 ]
then
    echo "Missing argument"
    exit
elif [ $# -ge 2 ]
then
    echo "Too many arguments"
    exit
elif [ $1 == "help" ]
then
    echo "$ ./make.sh help : affiche l'aide"
    echo "$ ./make.sh create : permet de créer la base de données vide"
    echo "$ ./make.sh add_data : permet d'ajouter les données dans la base"
    echo "$ ./make.sh select : permet d'exécuter les requêtes après avoir spécifié le nom du fichier à exécuter"
    echo "$ ./make.sh update : permet d'exécuter les requêtes de mises à jour après avoir spécifié le nom du fichier à exécuter"
    echo "$ ./make.sh clean : permet de supprimer la base de données"
    echo "$ ./make.sh reset : effectue successivement clean, create et add_data"
    echo "$ ./make.sh website : permet d'ouvrir le site web du projet (votre mot de passe peut être demandé)"
    exit
elif [ $1 == "create" ]
then
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/create.sql
    exit
elif [ $1 == "add_data" ]
then
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/add_data.sql
    exit
elif [ $1 == "select" ]
then
    echo "Fichiers de requêtes :"
    ls sql/queries 
    echo ""
    echo "Quel fichier voulez-vous exécuter ?" 
    read fichier
    f="$fichier"
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/queries/$f
    exit 
elif [ $1 == "update" ]
then
    echo "Fichiers de requêtes de mises à jour :"
    ls sql/update
    echo ""
    echo "Quel fichier voulez-vous exécuter ?" 
    read fichier
    f="$fichier"
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/update/$f
    exit 
elif [ $1 == "clean" ]
then
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/clean.sql
    exit    
elif [ $1 == "reset" ]
then
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/clean.sql
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/create.sql
    psql -h localhost -p 5432 -U moi -d jeux_de_plateau -a -f sql/add_data.sql
    exit  
elif [ $1 == "website" ]
then
    sudo cp -r ./* /var/www/html/
    firefox http://localhost/mywebsite/index.php &
    exit
else
    echo "Commande non valide, faire : ./make.sh help pour afficher l'aide."
    exit
fi
