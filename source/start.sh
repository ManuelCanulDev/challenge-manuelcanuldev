#!/bin/bash
if [ $(ls | wc -l) -eq 0 ];then 
    echo "Instalando dependencias"
    composer install
fi

composer install

composer dump-autoload

php artisan clear-compiled

composer clear-cache

cp .env.example .env

php artisan key:generate

php artisan cache:clear

php artisan config:clear

php artisan migrate --seed

php artisan optimize:clear

php artisan serve --host 0.0.0.0
