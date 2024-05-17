#!/bin/bash


php artisan migrate:fresh --seed
php artisan scribe:generate
php-fpm
