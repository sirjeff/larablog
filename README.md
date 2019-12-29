# larablog

**Test - Proof of Concept , Blog in Laravel**

This is the code behind [OMI-Blog](https://blog.omi.nz/ "OMI-Blog")
It was originally built as a demo for using Laravel in a real-world application.
Over time it turned into a fully functional Blog and is still being built on.

Technologies used thus far:
- Laravel
- TinyMCE
- Axios
- Bootstrap
- jQuery
- Parsley.js


## Pre-requisites

- MySQL
- PHP
- Composer

## Installation

Currently (as this is still in 'dev') you can use:

`composer create-project --stability dev sirjeff/larablog /FUL-PATH-TO-BLOG/`

Example using install directory c:/home/fishpants:

`composer create-project --stability dev sirjeff/larablog c:/home/fishpants`

I have different distros of PHP on my Windows dev. machine, therefore I am using PHP in the CLI, e.g. :

`/wamp/bin/php/php7.0.10/php.exe /bin/composer.phar create-project --stability dev sirjeff/larablog /home/larablog`




## Set-up

You'll have to do a few things before you can view the blog.

The following code examples use the blog location as c:/home/fishpants, and the db as fishpants (same username and passwordy for the password)

1. Start and connect to MySQL

 Log-in to MYSQL (make sure it's running first!)

 `mysql -u <<Your DB Username>> -p <<Your DB Password>>`


 (use your admin user name and password)

2. Create the db and user:

 ```
CREATE DATABASE fishpants;
CREATE USER 'fishpants'@'localhost' IDENTIFIED WITH mysql_native_password AS 'passwordy';
GRANT ALL PRIVILEGES ON *.* TO 'fishpants'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `fishpants`.* TO 'fishpants'@'localhost';
 ```

 **fishpants** and **passwordy** are just (poor) examples!


3. Update .env with new db details

 e.g.
 ```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=fishpants
DB_USERNAME=fishpants
DB_PASSWORD=passwordy 
 ```
 
4. Migrate the db

 `cd /home/fishpants`
 
 `php artisan migrate`
 
 
5. Start the web server

 `php artisan serve`

6. View blog!

 `http://localhost:8000/`
 
 
