FROM php:7.4-cli
WORKDIR /usr/src/app
COPY . .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080