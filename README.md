## Migrations

## Controllers

** Create Controllers As Per Requirements **
``` php artisan make:controller AttendanceController ```

## Models

** Create Models As Per Requirements **
``` php artisan make:model Attendance ```
## Routes

## Dependencies Or Packages

 **  to handle file uploads and Excel file parsing. we need to install package **

 ### For Excel
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

To create an Excel import class you need to run this command

``` php artisan make:import AttendanceImport ```
Use this website as  a Reference [Laravel Excel](https://docs.laravel-excel.com/3.1/getting-started/installation.html).
### For Laravel Passport

 ** To install passport package you need to run this command ,Laravel Passport is used for API authentication.  **

``` composer require laravel/passport ```

 ** Run migrate command that will migrated oauth's tables created by Laravel Passport.  **

``` php artisan migrate ```

** This Command created Personal Access Client **

``` php artisan passport:install ```

Use this official website as  a Reference [Laravel Passport](https://laravel.com/docs/8.x/passport).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
