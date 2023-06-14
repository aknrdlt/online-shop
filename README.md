## Requirements

	PHP = ^8.2.x
    laravel = ^10.x
## Install

Clone repo

```
git clone https://github.com/aknrdlt/online-shop.git
```

Install Composer


[Download Composer](https://getcomposer.org/download/)


composer update/install

```
composer install
```

## How to setting

```
create .env file 
(copy from .env.example)
```

Run the migration

```
php artisan migrate
```

Or run the migration with seeder if you want seeding the related data

```
php artisan migrate --seed
```

Generate a New Application Key

```
php artisan key:generate
```

API list

```
php artisan route:list
```
Run on localhost
```
php artisan serve
```
