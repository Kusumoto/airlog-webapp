
FROM kusumoto/docker-php5.6-dev-env:latest

COPY . /var/www/html

WORKDIR /var/www/html

COPY docker-entrypoint.sh /entrypoint.sh

RUN chmod 777 /entrypoint.sh

RUN mkdir /ci_session

RUN chmod 777 /ci_session

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]

CMD ["apache2-foreground"]