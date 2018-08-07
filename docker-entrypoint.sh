#!/bin/bash

FILE="/var/www/html/install.lock"

if [ -f "$FILE" ]; then
	exec apache2-foreground
else
	php /var/www/html/index.php installation docker_step1 $MONGO_HOST $MONGO_PORT $MONGO_DB $MONGO_USER $MONGO_PWD
	if [ "$NEWINSTALL" = "yes" ]; then
		php /var/www/html/index.php installation docker_step2 $SAMF_USER $SAMF_PWD $SAMF_NAMEF $SAMF_NAMEL $APIURL
	fi	
	touch $FILE
	chmod 755 /var/www/html
	chmod 755 /var/www/html/application/config
tee /var/www/html/application/helpers/sec_samf_helper.php <<EOF
<?php function sec_samf()
	{ } ?>
EOF
	rm -f /var/www/html/docker-entrypoint.sh
	exec apache2-foreground
fi

