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


### 9. Email Reminders

You must configure the **.env**  file to send email from your server. Please update the following lines:

`MAIL_MAILER=smtp`  
`MAIL_HOST=mailhog`  
`MAIL_PORT=1025`  
`MAIL_USERNAME=null`  
`MAIL_PASSWORD=null`  
`MAIL_ENCRYPTION=null`  
`MAIL_FROM_ADDRESS=null`  

Change these lines to reflect your SMTP server configuration settings.

Then Run,  
`php artisan schedule:work`

_the scheduler checks tasks each minute. therefore, add an item that due on 3 hours and 2 minutes_
