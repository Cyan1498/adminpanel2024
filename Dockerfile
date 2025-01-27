# Usa la imagen base de PHP
FROM php:8.1-apache

# Configura el servidor Apache
RUN a2enmod rewrite

# Instala las extensiones necesarias para Laravel
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos de la aplicación al contenedor
COPY . /var/www/html

# Instala las dependencias de la aplicación
WORKDIR /var/www/html

# Instala las dependencias necesarias para ext-grpc y ext-sodium
RUN apt-get update && \
    apt-get install -y \
        libc-ares-dev \
        libsodium-dev \
        && pecl install grpc \
        && docker-php-ext-enable grpc \
        && docker-php-ext-install sodium
        
RUN composer install --no-dev
RUN composer dump-autoload

# Configura las variables de entorno de Laravel
RUN cp .env.example .env
RUN php artisan key:generate

# Configura los permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 8080
EXPOSE 8080

# Comando por defecto para ejecutar el servidor Apache
CMD ["apache2-foreground"]
