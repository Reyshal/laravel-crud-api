## About This Project

Just a simple project that have authentication and crud for product model.

## Installation

-   clone this repository
-   composer install
    ```
        composer install
    ```
-   copy `.env.example` to `.env`
-   generate key
    ```
        php artisan key:generate
    ```
-   create the database & adjust the settings in `.env`
    ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel_crud_api
        DB_USERNAME=root
        DB_PASSWORD=
    ```
-   run fresh migration command
    ```
        php artisan migrate:fresh
    ```
-   run app by
    ```
        php artisan serve
    ```
