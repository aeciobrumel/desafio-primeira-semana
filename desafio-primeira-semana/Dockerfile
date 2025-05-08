FROM php:8.2-cli

# Instala dependências do sistema, incluindo libonig-dev
RUN apt-get update && apt-get install -y \
    zip unzip curl libzip-dev libonig-dev sqlite3 libsqlite3-dev libpng-dev \
    && docker-php-ext-install pdo pdo_sqlite mbstring zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /app

# Copia os arquivos do projeto
COPY . .

# Instala dependências PHP
RUN composer install

# Ajusta permissões
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
