Project Stanley
===============

Project Stanley aims to be a complete framework for creating Asterisk application with ARI, using PHP. Our objective
is to utilize existing PHP technologies and frameworks, without redeveloping the entire thing from scratch. The project
page is located at http://www.simionovich.com/project-stanley (temporary location for now).

Requirements
============
PHP >= 5.3.9 - Yes, this means you need to go up to CentOS 7, if you are using CentOS

Composer
========
Project Stanley relies heavily on Composer, to be more accurate, without out it - it will be very hard to get anything
off the ground here. To get composer installed correctly for your system - follow the below routine

``` sh
$ curl -sS https://getcomposer.org/installer | php
$ cp composer.phar /usr/local/bin/composer
$ chmod +x /usr/local/bin/composer
```

Installation
============
1. Copy the contents of 'opt' to your '/opt' directory, eg.

    ``` sh
    $ cd opt
    $ cp -R * /opt
    $ cd ..
    ```

2. Copy the contents of 'web-proxy' to your web server root serving directory (for apache normally will be /var/www/html)

    ``` sh
    $ cd web-proxy
    $ cp -R * /var/www/html
    $ cd ..
    ```
3. Now, we need to install our composer dependancies

    ``` sh
    $ cd /opt
    $ composer install
    ```

Usage
=====
Have a look at the "application" folder, under "web-proxy". You will see several examples on how to create an ARI
application using the CodeIgniter framework.

[This is a working document - far from being ready yet]

