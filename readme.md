<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="100px" alt="Laravel Logo">
    <h1 align="center">Laravel Eskiz SMS</h1>
    <br>
    <h6 align="center">Using this package, you can send SMS from ESKIZ SMS (eskiz.uz) to phone numbers in Uzbekistan.</h6>
</p>

# LaravelEskiz

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![License](https://poser.pugx.org/reliese/laravel/license)](https://packagist.org/packages/reliese/laravel)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![License](https://img.shields.io/github/license/uzsoftic/laravel-eskiz?style=flat-square)

![GitHub contributors](https://img.shields.io/github/contributors/uzsoftic/laravel-eskiz)
![GitHub last commit (branch)](https://img.shields.io/github/last-commit/uzsoftic/laravel-eskiz/main)
![GitHub Release Date - Published_At](https://img.shields.io/github/release-date/uzsoftic/laravel-eskiz)

https://shields.io/badges/git-hub-package-json-dynamic


Official API docs: https://documenter.getpostman.com/view/663428/RzfmES4z?version=latest

## Installation

Via Composer

``` bash
composer require uzsoftic/laravel-eskiz
```

Next, we need to add package service provider to config/app.php inside providers array.

``` php
Uzsoftic\LaravelEskiz\LaravelEskizServiceProvider::class,
```
And

```shell
php artisan vendor:publish --provider=Uzsoftic\LaravelEskiz\LaravelEskizServiceProvider
```

After installation, we need to migrate command.
```shell
php artisan migrate
```
Or
```shell
php artisan migrate --path=/database/migrations/2023_08_26_190625_create_eskiz_config_table.php
```
```shell
php artisan migrate --path=/database/migrations/2023_08_26_190642_create_eskiz_sms_table.php
```

## Usage

Configure with admin panel
> /admin/eskizsms/config

Generate Eskiz SMS Token
```shell
php artisan laravel-eskiz:generate
```



## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email softuzb@gmail.com instead of using the issue tracker.

## Credits

- [Umarov Kamoliddin][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/uzsoftic/laravel-eskiz.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/uzsoftic/laravel-eskiz.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/uzsoftic/laravel-eskiz/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/uzsoftic/laravel-eskiz
[link-downloads]: https://packagist.org/packages/uzsoftic/laravel-eskiz
[link-travis]: https://travis-ci.org/uzsoftic/laravel-eskiz
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/uzsoftic
[link-contributors]: ../../contributors

>  Developer: Umarov Kamoliddin! :wink:
