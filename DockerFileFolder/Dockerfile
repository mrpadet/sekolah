# Gunakan PHP 8.2 dengan Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install dependensi sistem dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    unzip zip git curl libzip-dev libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Salin composer.json dan composer.lock jika ada
COPY composer.json /var/www/html/
COPY composer.lock /var/www/html/  

# Jalankan Composer install (opsional: tambahkan pengecekan file jika error tanpa composer.lock)
RUN if [ -f composer.json ]; then \
        composer install --no-dev --optimize-autoloader --ignore-platform-reqs; \
    fi

# Salin semua file proyek ke dalam container
COPY . /var/www/html

# Buat folder writable dan ubah izinnya
RUN mkdir -p writable && chmod -R 777 writable

# Expose port 80 (HTTP) dan 443 (HTTPS, bukan 433)
EXPOSE 80
EXPOSE 443

# Jalankan Apache di foreground
CMD ["apache2-foreground"]