# ![Techno](public/img/icon/retechicon.ico) RE Tech Computer Parts E-commerce Website

> ### [RE Tech](http://112.204.9.82/) is an e-commerce business that specializes in providing a secure and reliable online shopping experience to customers looking for affordable computer parts and peripherals.

## [Laravel](#about-laravel) Framework 
- Laravel Breeze 
    - Account Authentication

## Laravel [Orchid](https://orchid.software/)
- Admin Management Panel
    - CRUD Functions

## Database Management System
- [MySQL](https://www.mysql.com/)

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x)

Clone the repository

<span style="color: blue;">

    git clone git@github.com:reicollamat/techno-retech.git
    
</span>

Switch to the repo folder

<span style="color: blue;">

    cd techno-retech
    
</span>

Install all the dependencies using composer

<span style="color: blue;">

    composer install
    
</span>

Copy the example env file and make the required configuration changes in the .env file

<span style="color: blue;">

    cp .env.example .env
    
</span>

Generate a new application key

<span style="color: blue;">

    php artisan key:generate
    
</span>

Generate a new JWT authentication secret key

<span style="color: blue;">

    php artisan jwt:generate
    
</span>

Run the database migrations (**Set the database connection in .env before migrating**)

<span style="color: blue;">

    php artisan migrate
    
</span>

Start the local development server

<span style="color: blue;">

    php artisan serve
    
</span>

You can now access the server at http://localhost:8000

**TL;DR command list**

<span style="color: blue;">

    git clone git@github.com:reicollamat/techno-retech.git
    cd techno-retech
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
        
</span>

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

<span style="color: blue;">

    php artisan migrate
    php artisan serve
        
</span>

## Database seeding

**Populate the database with seed data with relationships which includes users, categories, roles, products, and follows.**

<span style="color: blue;">

    database/seeds/DatabaseSeeder.php
        
</span>

Run the database seeder and you're done

<span style="color: blue;">

    php artisan db:seed
        
</span>

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

<span style="color: blue;">

    php artisan migrate:refresh
            
</span>


----------

# Code overview

## Dependencies

- [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable) - Easy creation of slugs for your Eloquent models in Laravel
- [orchid/platform](https://orchid.software/en/) - Platform for back-office applications, admin panel or CMS your Laravel app.

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers
- `app/Http/Middleware` - Contains the JWT auth middleware
- `app/Orchid/Filters` - Filters used to simplify the search for records using a typical filter
- `app/Orchid/Layouts` - Templates for screens to focus on defining the appearance of the page
- `app/Orchid/Presenters` - Used to format and present data consistently
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `public/img` - Contains all image assets
- `public/multishop` - Contains other assets for blade files
- `resources/views/` - Contains all the blade template files
- `routes` - Contains all the api routes defined in api.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
