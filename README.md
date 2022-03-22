*.Application files are either located in htdocs folder in Xampp or /var/www/html in a Linux environment.
It is mandatory to give full permisson to the root folder if this is running in a linux environment.
To change the database credentials (username and password) go to .env file in the system.

* create database 

to execute from the command line,go to the application folder and run below commands

composer install
php artisan migrate
php artisan passport:install
php artisan serve --port 83


*. URL of the application is as follows, http://127.0.0.1:83/ 

*. URL of the api doc  is as follows, http://127.0.0.1:83/api/documentation