FROM php:8.2-cli

# Instalar dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    zip libcurl4-openssl-dev libssl-dev gnupg2 pkg-config libicu-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && pecl install redis mongodb \
    && docker-php-ext-enable redis mongodb

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar Node.js 18 y npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Directorio de trabajo
WORKDIR /var/www/html
