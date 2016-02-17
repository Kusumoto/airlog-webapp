#!/bin/bash

php /var/www/html/index.php installation docker_step1 $MONGO_HOST $MONGO_PORT $MONGO_USER $MONGO_PWD $MONGO_DB

php /var/www/html/index.php installation docker_step2 $SAMF_USER $SAMF_PWD $SAMF_NAMEF $SAMF_NAMEL

touch /var/www/html/install.lock

exec apache2-foreground