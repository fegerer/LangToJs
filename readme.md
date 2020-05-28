# LangToJs

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Laravel Translations in Javascript.

## Installation

Via Composer

``` bash
$ composer require fegerer/langtojs
```

## Usage

### Publish Config
php artisan vendor:publish --provider Fegerer\LangToJs\LangToJsServiceProvider

Edit ``langtojs.php`` 

### Render the Scripts.
``` html
{!! LangToJs::scripts() !!}
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/fegerer/langtojs.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/fegerer/langtojs.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/fegerer/langtojs/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/fegerer/langtojs
[link-downloads]: https://packagist.org/packages/fegerer/langtojs
[link-travis]: https://travis-ci.org/fegerer/langtojs
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/fegerer
[link-contributors]: ../../contributors
