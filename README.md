## How to setup

1. Run `git clone url`
2. Run `composer install`
3. Duplicate file `.env.example` and rename it to `.env`
4. Setup your database setting based on docker compose setting, by default be like
   * `DB_CONNECTION`=mysql
   * `DB_HOST`=127.0.0.1
   * `DB_PORT`=3306
   * `DB_DATABASE`=online-shop
   * `DB_USERNAME`=root
   * `DB_PASSWORD`=secret
5. Setup you email configuration
    * `MAIL_DRIVER=smtp`
    * `MAIL_HOST=smtp.googlemail.com`
    * `MAIL_PORT=465`
    * `MAIL_USERNAME=blogsayailham@gmail.com`
    * `MAIL_PASSWORD=iLhsRy21bLogs`
    * `MAIL_ENCRYPTION=ssl`
6. Run `php artisan key generate`
7. Run `php artisan migrate` to migrate database