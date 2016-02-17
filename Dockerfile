
FROM kusumoto/docker-php5.6-dev-env:latest

COPY . /var/www/html

WORKDIR /var/www/html

COPY docker-entrypoint.sh /var/www/html/entrypoint.sh

RUN chmod 777 /var/www/html/entrypoint.sh

ENTRYPOINT ["/var/www/html/entrypoint.sh"]

EXPOSE 80

CMD ["apache2-foreground"]