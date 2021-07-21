<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About the Project

A blog focused website that uses Laravel 8.5 and PHP 7.3.


### Development Environment

- **[Laravel 8.5](https://laravel.com/docs/8.x/releases)**
- **[PHP 7.3](https://www.php.net/releases/7_0_0.php)**
- **[MySQL 8.0](https://dev.mysql.com/doc/relnotes/mysql/8.0/en/news-8-0-25.html)**

### Installation Helpers

- **[Composer 2.1.3](https://getcomposer.org/download/)**
- **[Laravel 8.x](https://laravel.com/docs/8.x)**
- **[PHP](https://www.php.net/manual/en/install.phpp)**
- **[MySQL](https://dev.mysql.com/downloads/installer/)**

## Seed Examples
Running the migrations with the seeds:
```bash
$ php artisan migrate --seed
```

This will create a new admin and a user that you can use to sign in:
```yml
email: admin@test.com
username: admin
password: password
```

```yml
email: user1@test.com
username: user1
password: password
```

## Useful Commands
Running the project:
```bash
$ php artisan serve
```

Seeding the database:
```bash
$ php artisan db:seed
```

Rebuild database and run db seeds:
```bash
$ php artisan migrate:refresh --seed
```

Configure directory for saving images:
**(Image upload functions are still on development)**
```bash
$ php artisan storage:link
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
