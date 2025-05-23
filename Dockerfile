# Dockerfile
FROM php:8.3-apache

# Instalar extensões do PHP e dependências
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    zip \
    && docker-php-ext-install intl pdo pdo_mysql zip

# Ativar o mod_rewrite do Apache (necessário para CakePHP)
RUN a2enmod rewrite

# Instalar o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar arquivos do projeto
COPY . /var/www/html

# Definir permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Definir diretório de trabalho
WORKDIR /var/www/html
