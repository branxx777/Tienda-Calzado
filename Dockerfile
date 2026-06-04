FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN npm install
RUN npm run build

RUN mkdir -p database
RUN touch database/database.sqlite

RUN chmod -R 775 storage bootstrap/cache database

ENV WEBROOT=/var/www/html/public

CMD php artisan migrate --force && php artisan storage:link && /start.sh