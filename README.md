<p align="center"><a href="https://fnx.com.ua" target="_blank"><img src="https://i.work.ua/employer_design/7/2/2/144722_company_logo_5.png" alt="FNX"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="250" alt="Laravel Logo"></a>
</p>

## Fenix industry task for Laravel back-end developer position.

This task includes the implementation of a shopping cart functionality.


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports: 

- PHP 8.2.
- Docker Compose version v2.3.3
### SetUp

First of all, create and run the **docker** containers

~~~
docker compose up -d --build
~~~

Then, install **composer** inside the **fnx_app** container
~~~
docker exec -it fnx_app composer install
~~~
### Environment

Create **.env** file form **.env.example** with **db** credentials
~~~
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=fnx_db
DB_USERNAME=fnxuser
DB_PASSWORD=fnxpass
# DB_OPTIONS='--allowPublicKeyRetrieval=true'
~~~

### Migrations and Seeds

Create migrations tables
~~~
docker exec -it fnx_app php artisan migrate
~~~
> **NOTES:**
> Migration works only from php **fnx_app** container.
> You can use just only **docker exec -it fnx_app** command enter the **fnx_app** container.

Calling Seeders
~~~
docker exec -it fnx_app php artisan db:seed
~~~

### Filesystem

Create the symbolic storage link for publicly accessible.
~~~
php artisan storage:link
~~~
> **NOTES:**
> Migration works only from php **fnx_app** container.
> You can use just only **docker exec -it fnx_app** command enter the **fnx_app** container.

Now, you can open the project

**Laravel**: http://localhost:8080

**phpMyAdmin**: http://localhost:8081
