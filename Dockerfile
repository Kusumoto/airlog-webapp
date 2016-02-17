
FROM kusumoto/docker-php5.6-dev-env:latest

COPY . /var/www/html

WORKDIR /var/www/html

COPY docker-entrypoint.sh /var/www/html/entrypoint.sh

RUN php /var/www/html/index.php installation docker_step1 {"$MONGO_HOST"} {"$MONGO_PORT"} {"$MONGO_USER"} {"$MONGO_PWD"} {"$MONGO_DB"}

RUN php /var/www/html/index.php installation docker_step2 {"$SAMF_USER"} {"$SAMF_PWD"} {"$SAMF_NAMEF"} {"$SAMF_NAMEL"}

EXPOSE 80

CMD ["apache2-foreground"]