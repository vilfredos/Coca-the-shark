# Usa la imagen oficial de PHP como base
FROM php:8.2-cli

# Instala dependencias de sistema necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath xml

# Instala Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de la aplicación al contenedor
COPY . .

# Instala las dependencias de PHP usando Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Genera la clave de la aplicación Laravel
RUN php artisan key:generate --ansi

# Establece los permisos adecuados para los directorios de almacenamiento
RUN chown -R www-data:www-data storage bootstrap/cache

# Expone el puerto 8000 (puedes ajustar esto según tus necesidades)
EXPOSE 8000

# Comando para iniciar la aplicación (ajusta esto según tus necesidades)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]