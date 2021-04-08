# Webnotes

Webnotes est une application de prise de note.

## Environnement de développement 

### Pré-requis

* PHP 7.4
* Composer 
* Node.js
* npm
* XAMPP / LAMP

Vous pouvez vérifier les pré-requis avec les commandes suivantes : 

```bash
php -v
composer --version
node -v
npm -v
```

### Lancer l'environnement de développement

Vérifiez bien que le serveur Xampp ou Lamp est lancé.

```bash
composer install
npm install
cp .env.dist env.local
```
Dans le fichier .env.local remplacez les paramètres suivants à la ligne 32 par vos paramètres de connexion à votre base de données:
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
* db_user
* db_password
* db_name
* si vous utilisez Xampp : remplacez 5.7 par mariadb-10.4.11

```bash
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php -S localhost:2144 -t public/
```