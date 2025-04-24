# Escolhe uma imagem PHP com Alpine (leve) e extensões comuns
FROM php:8.1-fpm-alpine

# Instala extensões necessárias para Laravel (pdo, mbstring, etc)
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /app

# Copia o código da sua aplicação
COPY . .

# Instala dependências via Composer
RUN composer install --no-dev --optimize-autoloader

# Gera a APP_KEY (se você não tiver) e roda migrations forçadas
RUN php artisan key:generate
RUN php artisan migrate --force

# Expõe a porta que o Artisan Serve usará
EXPOSE 10000

# Comando para iniciar o servidor
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
