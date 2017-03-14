# A Laravel wrapper for LiquidPixel's Liquifire

Use this Laravel wrapper to make easy calls to [**Liquid Pixels Liquifire**](http://www.liquidpixels.com/solutions/liquifire-os.m) Tool. It's as simple as a Single line of code within your [**Laravel**](http://laravel.com/) application - that's all it takes.


Dependencies
------------
 * [**PHP cURL**] (http://php.net/manual/en/curl.installation.php)
 * [**Laravel >= 5.2**] (https://laravel.com/docs/5.2)


Installation
------------

To install use the following console comman:
```
composer require novocast/liquifire:dev-master
```

Or add the following line into your `composer.json` file, and run `composer update` in your console:

```php
"novocast/liquifire": "dev-master"
```


Configuration
-------------

To start using this module all you need to do is register the Laravel service provider with Laravel. You can find this in your `config/app.php` file:

```php
'providers' => [
	...
    Novocast\Liquifire\LiquifireServiceProvider::class,
    ...
]

'aliases' => [
	...
    'Liquifire' => Novocast\Liquifire\LiquifireFacade::class,
    ...
]
```

Publish your configuration file:

```php 
    php artisan vendor:publish
``` 

Finally, replace the required Key with your own, as `LIQUIFIRE_KEY` in your `.env` file.


How to Use
-----

