FROM php:apache
RUN a2enmod rewrite && service apache2 restart
RUN docker-php-ext-install pdo pdo_mysql