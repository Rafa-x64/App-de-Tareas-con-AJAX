# Usa imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia tu app al directorio público de Apache
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html/

# Establece permisos si es necesario
RUN chown -R www-data:www-data /var/www/html

# Instala Composer si lo usas
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Expone el puerto 80
EXPOSE 80