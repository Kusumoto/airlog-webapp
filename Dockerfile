
FROM kusumoto/docker-php5.6-dev-env:latest

COPY . /var/www/html

WORKDIR /var/www/html

COPY docker-entrypoint.sh /entrypoint.sh

RUN sh /entrypoint.sh

EXPOSE 80

CMD ["apache2-foreground"]