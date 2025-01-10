FROM php:8.1-apache

WORKDIR /var/www/html

COPY chall /var/www/html

RUN apt-get update \
    && apt-get install -y \
    bash \
    dnsutils \
    wget \
    curl \
    netcat-openbsd \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

RUN chown root:root -R /var/www/html
RUN chmod 755 /var/www/html

# Start Apache
CMD ["apache2-foreground"]