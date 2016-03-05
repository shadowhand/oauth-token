# OAuth Token

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require league/oauth-token
```

## Usage

``` php
$token = new League\Token\AccessToken();
echo (string) $token;
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email <woody.gilk@gmail.com> instead of using the issue tracker.

## Credits

- [Woody Gilk][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/oauth-token.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/oauth-token/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/oauth-token.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/oauth-token.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/oauth-token.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/oauth-token
[link-travis]: https://travis-ci.org/thephpleague/oauth-token
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/oauth-token/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/oauth-token
[link-downloads]: https://packagist.org/packages/league/oauth-token
[link-author]: https://github.com/shadowhand
[link-contributors]: ../../contributors
