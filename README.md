# PHP Developer Test (Vouchers App)

## System Requirements

* PHP >= 7.0.0 with
    * OpenSSL PHP Extension
    * PDO PHP Extension
    * Mbstring PHP Extension
    * Tokenizer PHP Extension
* [Composer](https://getcomposer.org) installed to load the dependencies.

## Install

1. Install dependencies, run:
`composer install`
2. Renamed the `.env.example` file to `.env`
3. Update the database configuration in `.env`
4. Run `php artisan migrate` to populate your database
5. If you to seed the database with test data run `php artisan db:seed`
6. Simply run `php artisan serve`

## Technology used
* Laravel 5.5 was chosen as it's among affordable and easy framework to build a website.

## Frontend
To serve the frontend go to `http://127.0.0.1:8000`.
