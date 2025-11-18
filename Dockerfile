# Stage 1: Node builder para assets
FROM node:20-alpine AS node_builder

WORKDIR /app

# Copiar solo package.json y package-lock.json si existe
COPY package.json ./
COPY package-lock.json ./

# Instalar dependencias de Node
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi

# Copiar todo el proyecto para construir assets (si usas Laravel Mix o Vite)
COPY . .

# Aquí podrías ejecutar build de assets si es necesario
# RUN npm run build

# Stage 2: PHP / Laravel
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Instalar dependencias de PHP
RUN set -eux; \
    apk update; \
    apk add --no-cache --virtual .build-deps \
        autoconf dpkg-dev dpkg file g++ gcc libc-dev make pkgconf re2c icu-dev sqlite-dev oniguruma-dev libzip-dev; \
    apk add --no-cache icu sqlite-libs git unzip nodejs npm; \
    docker-php-ext-configure intl; \
    docker-php-ext-install -j"$(nproc)" pdo_sqlite bcmath intl mbstring; \
    docker-php-ext-enable opcache; \
    apk del .build-deps

# Copiar Laravel desde el stage Node
COPY --from=node_builder /app /var/www/html

# Copiar y configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configuración de Laravel
COPY .env.example .env
RUN php artisan key:generate

EXPOSE 9000

CMD ["php-fpm"]
