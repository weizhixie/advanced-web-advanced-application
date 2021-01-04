# Snack Shop

This repository is for Advanced Web Programming Assignment 2.

A Laravel app capable to make user registration, login with Github, Google, upload images, edit user information, write and read reviews and more.

## Environment and Configuration
1. Clone or copy repo
2. `$ composer install`
3. `$ npm install`
4. `$ npm run dev`
5. `$ cp .env.example .env`

The following settings are required:

- Configure Mail, Github, Google and font-awesome credential in .env file to make the features become available.

- A database connection, with username and password. 
  MySQL or MariaDB are fine. [XAMPP](https://www.apachefriends.org/index.html)
  recommended.

## Initialization
`$ php artisan key:generate`

`$ php artisan migrate:fresh --seed`

`$ php artisan storage:link` - create a symbolic link allows the files accessible from web

## Startup

`$ php artisan serve`

App will be available at the URI displayed.