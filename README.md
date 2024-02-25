# Laravel SIASN SIMPEG

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kanekescom/laravel-siasn-simpeg.svg?style=flat-square)](https://packagist.org/packages/kanekescom/laravel-siasn-simpeg)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kanekescom/laravel-siasn-simpeg/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kanekescom/laravel-siasn-simpeg/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kanekescom/laravel-siasn-simpeg/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kanekescom/laravel-siasn-simpeg/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kanekescom/laravel-siasn-simpeg.svg?style=flat-square)](https://packagist.org/packages/kanekescom/laravel-siasn-simpeg)

This library is the abstraction of SIASN SIMPEG API for access from applications written with Laravel PHP Framework.

## Support us

Want to provide tangible support? Use the following platform to contribute to open-source software developers. Every contribution you make is a significant boost to continue building and enhancing technology that benefits everyone.

- Buy Me a Coffee https://s.id/hadibmac
- Patreon https://s.id/hadipatreon
- Saweria https://s.id/hadisaweria

We highly appreciate you sending us a few cups of coffee to accompany us while writing code. Super thanks.

## Installation

You can install the package via composer:

```bash
composer require kanekescom/laravel-siasn-simpeg
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="siasn-simpeg-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="siasn-simpeg-config"
```

## Usage

### Import pegawai
Import pegawai to database via csv file exported from SIASN Export Data ASN.

```bash
php artisan siasn-simpeg:import {filePath}
```

Import pegawai by truncate data first.

```bash
php artisan siasn-simpeg:import {filePath} --truncate
```

### Pull riwayat pegawai
Pull riwayat pegawai from API.

```bash
php artisan siasn-simpeg:pull-riwayat
```

You can also use the ```endpoint``` argument to specify only certain endpoints and or use the ```nipBaru``` argument to specify only certain employee to be pulled.

Use ```--skip=0``` option to skip N pegawai.

and use ```--track``` option to track the data pulling process.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Achmad Hadi Kurnia](https://github.com/kanekescom)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
