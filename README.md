## Migrations

## Controllers

## Models

## Dependencies

``` composer require maatwebsite/excel ```

The Maatwebsite\Excel\ExcelServiceProvider is auto-discovered and registered by default.

If you want to register it yourself, add the ServiceProvider in config/app.php

```
    'providers' => [
        /*
        * Package Service Providers...
        */
        Maatwebsite\Excel\ExcelServiceProvider::class,
    ]

```

The Excel facade is also auto-discovered.

If you want to add it manually, add the Facade in config/app.php:

``` 
'aliases' => [
    ...
    'Excel' => Maatwebsite\Excel\Facades\Excel::class,
]

```
To publish the config, run the vendor publish command:
``` php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config ```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
