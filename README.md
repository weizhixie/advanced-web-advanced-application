# Snack Shop

This repo is for Advanced Web Programming Assignment 1.

A simple Laravel app to illustrate CRUD operations on a single model.

## Environment and Config
1. Clone or copy repo
2. `$ composer install`
3. `$ npm install`
4. `$ npm run dev`
5. `$ cp .env.example .env`

The following settings are required:

- A database connection, with username and password. 
  MySQL or MariaDB are fine. [XAMPP](https://www.apachefriends.org/index.html)
  recommended.

## Initialisation

`$ php artisan key:generate`

`$ php artisan migrate:fresh --seed`

`$ php artisan storage:link` to create the symbolic to make stored files accessible from web

## Startup

`$ php artisan serve`

App will be available at the URI displayed.