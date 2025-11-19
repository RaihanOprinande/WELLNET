FROM php:8.2-fpm

# Install requirements
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev

# Install MySQL Driver
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
