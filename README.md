<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

### 1. Download
[View on GitHub](https://github.com/achintharodrigo/todo)
Download the files above and place on your server.

### 2. Environment Files
Rename the  **.env.example** file to just  **.env**

### 3. Composer

Run,  
`composer install`

### 4. NPM Install
Run from the root of the project,  
`npm install`

### 5. Create Database

You must create your database on your server and on your  **.env**  file update the following lines:

`DB_CONNECTION=mysql`  
`DB_HOST=127.0.0.1`  
`DB_PORT=3306`  
`DB_DATABASE=your_database`  
`DB_USERNAME=your_db_username`  
`DB_PASSWORD=your_db_password`  

Change these lines to reflect your new database settings.

### 6. Artisan Commands

Please run following atrisan commands.

`php artisan key:generate`  
`php artisan migrate --seed`  
`php artisan passport:install`

### 7. NPM Run '*'

Run accodingly,  
`npm run <command>` _eg: npm run dev_

### 8. Login

After your project is installed, and you can access it in a browser, click the login button on the right of the navigation bar.

The demo credentials are:

**email:**  user@user.com  
**password:**  password
