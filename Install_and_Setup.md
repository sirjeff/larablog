#Install and Set Up Instructions

More detail given here than in the 'Read Me' file

## Installing

Install the project using composer :

In this example I'm installing **LaraBlog** into the `/home/fishpants directory`

`C:\>composer create-project sirjeff/larablog /home/fishpants 1.1

Composer downloads and installs the project ... "Installing sirjeff/larablog (v1.1)"
Some info appears during the install and it should end by setting a unique application key that it adds to the `.env` file :

"Application key [base64:X4cotokTA8AXyZd6W5BZBGnmysTVfnXL9ulPACtddh4=] set successfully

If you don't have composer in your path, you can download [composer.phar from https://getcomposer.org/download/](https://getcomposer.org/download/)

And run it on CLI like so:

`C:\>/wamp/bin/php/php7.0.10/php.exe /bin/composer.phar create-project sirjeff/larablog /home/fishpants 1.1`

This example also shows how to run composer with any installed version of PHP

_( Note: You can omit the Windows **c:** from path names on CLI (and in most scripts) as long as you use forward slash **/** instead of backslash_

_Example: **c:/home/peter/docs** is the same as **/home/peter/docs** _

_But Note in this note, the auto-complete using the TAB key doesn't work in CLI when you use a slash. )_




## Set-up

1 Create DB table
2 Import DB

Sign-in with admin details:

user: admin@madeup.domain.co.nz
password: password



Basic Apache Virtual Host setup

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
 
## Notes

### Video format

The most reliable format/codec for your online videos is H.264/AAC :

mpeg 4 video - H.264, the suffix .mp4 works 

mpeg 4 audio - AAC, the suffix .aac works

