# newswebs1

Nous allons partir d'une DB que nous avons déjà installée:

`datas/newswebs1.sql`

## Requis

- php v8.0.*
- composer
- symfony.exe ( https://symfony.com/download )
- node.js et npm

## Installation

dans la console

        symfony new newswebs1 --webapp
        ou
        composer create-project symfony/skeleton newswebs1

Pour activer le SSL (https) :

        symfony server:ca:install

Puis on entre dans le dossier

        cd newswebs1
        symfony serve -d

Vous pouvez afficher le site à cette URL:

https://127.0.0.1:8000

Pour l'éteindre :

        symfony server:stop

## Configuration

Enregistrez .env en `.env.local` et modifiez ces lignes pour que la DB soit celle choisie pour le projet :

        # DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
        DATABASE_URL="mysql://root:@127.0.0.1:3307/newswebs1?charset=utf8"

