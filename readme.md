Admin template

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]



## Install

Via Composer

``` bash
$ git clone https://github.com/nguyenmanh1997/sachdoidoi.com.git
```

## Usage
1. run commands install package’s
``` bash
$ composer install
```

coppy .env.example to .env 

Method 1: Run

``` bash
$ php artisan blog:install
```

Method 2:

1. Run commands
``` bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```
2. Run commands to publish the package’s config and assets and database
``` bash
$ php artisan vendor:publish
$ php artisan migrate
```

3. Go to  domain/ and check it. 
4. Go to  domain/admin and check it. 
``` bash
gmail: nguyenmanh0397@gmail.com
password: 123456
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email nguyenmanh0397@gmail.com instead of using the issue tracker.

## Credits

- [Nguyễn Mạnh][https://fb.com/nguyenmanh1997]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/nguyenmanh1997.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/nguyenmanh1997/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/nguyenmanh1997.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/nguyenmanh1997
[link-travis]: https://travis-ci.org/nguyenmanh1997
[link-scrutinizer]: https://scrutinizer-ci.com/g/nguyenmanh1997/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/nguyenmanh1997
[link-downloads]: https://packagist.org/packages/nguyenmanh1997
[link-author]: https://github.com/nguyenmanh1997
[link-contributors]: ../../contributors
