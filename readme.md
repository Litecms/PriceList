This is a Litecms 5 package that provides pricelist management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/pricelist`.

    "litecms/pricelist": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\PriceList\Providers\PriceListServiceProvider::class,

```

And also add it to alias

```php
'PriceList'  => Litecms\PriceList\Facades\PriceList::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Litecms\PriceList\Providers\PriceListServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Litecms\PriceList\Providers\PriceListServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Litecms\PriceList\Providers\PriceListServiceProvider" --tag="config"

Language files

    php artisan vendor:publish --provider="Litecms\PriceList\Providers\PriceListServiceProvider" --tag="lang"

Views files

    php artisan vendor:publish --provider="Litecms\PriceList\Providers\PriceListServiceProvider" --tag="views"

Public folders

    php artisan vendor:publish --provider="Litecms\PriceList\Providers\PriceListServiceProvider" --tag="public"
   

Publish admin views only if it is necessary.

## Usage


