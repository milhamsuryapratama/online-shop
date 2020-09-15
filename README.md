## How to setup

1. Run `git clone https://github.com/milhamsuryapratama/online-shop.git`
2. Run `composer install`
3. Duplicate file `.env.example` and rename it to `.env`
4. Setup your database setting based on docker compose setting, by default be like
   * `DB_CONNECTION`=mysql
   * `DB_HOST`=127.0.0.1
   * `DB_PORT`=3306
   * `DB_DATABASE`=online-shop
   * `DB_USERNAME`=root
   * `DB_PASSWORD`=secret
5. Setup you email configuration in `.env`
    * `MAIL_DRIVER` : smtp
    * `MAIL_HOST` : smtp.mailtrap.io
    * `MAIL_PORT` : 2525
    * `MAIL_USERNAME` : d88353424a9e23
    * `MAIL_PASSWORD` : 73b13322beb99e
6. Setup pusher credential in `.env`
    * `PUSHER_APP_ID` : 1073107
    * `PUSHER_APP_KEY` : 727557e4dca12f7c6c97
    * `PUSHER_APP_SECRET` : af28942c15c925941aae
    * `PUSHER_APP_CLUSTER`  : ap1
7. Change `BROADCAST_DRIVER` : pusher 
7. Run `php artisan key:generate`
8. Run `php artisan migrate` to migrate database
9. Run `composer dump-autoload`
10. Run `php artisan db:seed` to seed database data
11. Run `php artisan serve` to start app
12. Server runing on `http://localhost:8000`

## Flowchart

<img src="https://github.com/milhamsuryapratama/online-shop/blob/master/public/assets/flowchart/flowchart.jpg"/>

## Login Admin

admin page is a place where we can add data such as category data, products and see transactions that have been done by users.

1. Visit `http://localhost:8000/admin`
2. Login with
    * `email` : admin@gmail.com
    * `password` : admin123
    