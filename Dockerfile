FROM php:8.4-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev nodejs npm \
    && docker-php-ext-install zip pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN npm install && npm run build

RUN mkdir -p database storage bootstrap/cache
RUN touch database/database.sqlite
RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 10000

CMD php artisan migrate --force && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=10000