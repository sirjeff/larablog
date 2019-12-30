# Install and Set Up Instructions

More detail given here than in the 'Read Me' file

## Installing

Install the project using composer :

In this example I'm installing **LaraBlog version 1.1** into the `/home/fishpants directory`

`C:\>composer create-project sirjeff/larablog /home/fishpants 1.1`

Composer downloads and installs the project ... "Installing sirjeff/larablog (v1.1)" ... it will say.
More info appears during the install and it should end by setting a unique application key that it adds to the `.env` file :

"Application key [base64:X4cotokTA8AXyZd6W5BZBGnmysTVfnXL9ulPACtddh4=] set successfully"

If you don't have composer in your path, you can download [composer.phar from https://getcomposer.org/download/](https://getcomposer.org/download/)

And run it on CLI like so:

`C:\>/wamp/bin/php/php7.0.10/php.exe /bin/composer.phar create-project sirjeff/larablog /home/fishpants 1.1`

This example also shows how to run Composer with any installed version of PHP

> **Note:** In Windows you can omit the **c:** from path names on CLI (and in most scripts) as long as you use forward slash **/** instead of backslash.   
> Example: **c:/home/peter/docs** is the same as **/home/peter/docs**    
> But Note in this note, the auto-complete using the TAB key doesn't work in CLI when you use a slash.




## Set-up

After installing the project there are some steps you will need to do before you can view the blog.

1. Start and connect to MySQL

LaraBlog was built with MySQL for DB storage.

Log-in to MYSQL (make sure it's running first!)

`mysql -u <<Your DB Username>> -p <<Your DB Password>>`

(use your admin user name and password)

2. Create the db and user

Whilst logged into mysql run the following:
```mysql
CREATE DATABASE fishpants;
CREATE USER 'fishpants'@'localhost' IDENTIFIED WITH mysql_native_password AS 'passwordy';
GRANT USAGE ON *.* TO 'fishpants'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `fishpants`.* TO 'fishpants'@'localhost';
```
**fishpants** and **passwordy** are just (poor) examples!

3. Import DB

There is an SQL file in the root directory of the project "`larablog.sql`"

CD to the project directory and run :

`mysql -u fishpants -p fishpants < /home/fishpants/larablog.sql`

(this is using db name and directory from previous examples)


4. Update .env with new db details

e.g.
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=fishpants
DB_USERNAME=fishpants
DB_PASSWORD=passwordy 
```

5. Run your web server

To keep things simple. You can launch the built in server:

`php artisan serve`

fromt within your project directory.

This will start a web server on port 8000

If you want to set up your on web server or run a virtual host in Apache 
see the notes in the ["Other bits and pieces"](#Other-bits-and-pieces) section

6. View your blog
In your browser go to http://127.0.0.1:8000


7. Sign in as admin
Sign-in with admin details:

user: admin@madeup.domain.co.nz
password: password


 
## Other-bits-and-pieces

### Basic Apache Virtual Host setup

```apache
<VirtualHost *:80>
  ServerName larablog
  DocumentRoot "/home/larablog/public"
  <Directory "/home/larablog/public">
    AllowOverride All
  </Directory>
  LogLevel warn
  ErrorLog "/home/larablog/log/err.log"
  CustomLog "/home/larablog/log/acs.log" combined
</VirtualHost>

```
 
### Video format

The most reliable format/codec for your online videos is H.264/AAC :

mpeg 4 video - H.264, the suffix .mp4 works 

mpeg 4 audio - AAC, the suffix .aac works

