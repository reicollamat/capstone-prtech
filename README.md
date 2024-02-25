# ![Techno](public/img/brand/png/logo-color-landscape.png) PR Tech Computer Parts E-commerce Website

> ### [PR Tech](https://github.com/reicollamat/capstone-prtech.git) is an e-commerce business that specializes in providing a secure and reliable online shopping experience to customers looking for affordable computer parts and peripherals.

## [Laravel](#about-laravel) Framework

-   Laravel Breeze
    -   Account Authentication

## Laravel [Orchid](https://orchid.software/)

-   Admin Management Panel
    -   CRUD Functions

## Database Management System

-   [MySQL](https://www.mysql.com/)

## Dataset

-   [PcPartPicker](https://github.com/docyx/pc-part-dataset) by docyx

---

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x)

Clone the repository

    git clone https://github.com/reicollamat/capstone-prtech.git

Switch to the repo folder

    cd capstone-prtech

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:reicollamat/techno-retech.git
    cd techno-retech
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, categories, roles, products, and follows.**

    database/seeds/DatabaseSeeder.php

Run the database seeder and you're done

    php artisan db:seed

**_Note_** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

---

# Code overview

## Dependencies

-   [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable) - Easy creation of slugs for your Eloquent models in Laravel
-   [orchid/platform](https://orchid.software/en/) - Platform for back-office applications, admin panel or CMS your Laravel app.

## Folders

-   `app` - Contains all the Eloquent models
-   `app/Http/Controllers` - Contains all the controllers
-   `app/Http/Middleware` - Contains the JWT auth middleware
-   `app/Orchid/Filters` - Filters used to simplify the search for records using a typical filter
-   `app/Orchid/Layouts` - Templates for screens to focus on defining the appearance of the page
-   `app/Orchid/Presenters` - Used to format and present data consistently
-   `config` - Contains all the application configuration files
-   `database/factories` - Contains the model factory for all the models
-   `database/migrations` - Contains all the database migrations
-   `database/seeds` - Contains the database seeder
-   `database/product_dataset` - Contains the pc parts dataset
-   `public/img` - Contains all image assets
-   `public/multishop` - Contains other assets for blade files
-   `resources/views/` - Contains all the blade template files
-   `routes` - Contains all the api routes defined in api.php file

## Environment variables

-   `.env` - Environment variables can be set in this file

**_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
