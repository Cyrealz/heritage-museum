ARG PHP_VERSION=8.5
FROM php:${PHP_VERSION}-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

COPY . /var/www/html/

ENV APACHE_DOCUMENT_ROOT=/var/www/html/web

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

RUN printf '%s\n' \
    '<Directory /var/www/html/web>' \
    '    AllowOverride All' \
    '    Require all granted' \
    '    Options FollowSymLinks' \
    '</Directory>' \
    > /etc/apache2/conf-available/drupal.conf

RUN a2enconf drupal

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
