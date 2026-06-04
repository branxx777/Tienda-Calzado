FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN mkdir -p database && touch database/database.sqlite

RUN chown -R www-data:www-data storage bootstrap/cache database

RUN chmod -R 775 storage bootstrap/cache database

ENV WEBROOT=/var/www/html/public

CMD php artisan migrate --force && php artisan storage:link && /start.sh