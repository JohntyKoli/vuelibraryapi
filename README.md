## About Vue Libraray Api
This is an Api for creating updated and deleated books in the library this is completly written in laravel 9.


## Prerequist
PHP >=8.0 


# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)


Clone the repository

    git clone https://github.com/JohntyKoli/vuelibraryapi.git

Switch to the repo folder

    cd vuelibraryapi 

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Set the database connection in .env (Make changes accordingly)

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=api
    DB_USERNAME=root
    DB_PASSWORD=


Run the database migrations 
**Make sure you set the correct database connection information before running the migrations** 

    php artisan migrate
**To create fresh Migration** 
    php artisan migrate:refresh

Run the database Seeder (this will imprort dummy data) 

    php artisan db:seed

Start the  server
    
    php artisan serve

You can now access the Api at http://127.0.0.1:8000/api/login
**Incase If port is changed please replace 8000 with respective port Number** 

Now login Using these credentails
    email: admin@email.com
    password: Admin@1234

