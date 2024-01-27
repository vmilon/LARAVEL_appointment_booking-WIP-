Project Overview
This Laravel project is a web application for managing appointments. Users can create, edit, and delete appointments.

Prerequisites
Before you begin, ensure you have installed the following:

PHP installed (minimum version: 7.4)
Composer
Node.js 
MySQL or another compatible database 
Laravel (version: 8.x)

Clone the Repository:
git clone https://github.com/your-username/your-repository.git


Navigate to the Project Directory with cmd or other terminal:
cd your-repository

Install PHP Dependencies:
composer install

Install JavaScript Dependencies:
npm install

Create a Copy of the .env File:
cp .env.example .env


Generate Application Key:
php artisan key:generate


Update Database Configuration in .env:
Set your database credentials in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yoltlabs
DB_USERNAME=yoltlabs
DB_PASSWORD=bm225614



Run Migrations:
php artisan migrate



Start the Development Server:
php artisan serve


Open your browser and navigate to http://localhost:8000
