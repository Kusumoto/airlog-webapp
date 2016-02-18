#!/bin/bash

FILE="/var/www/html/install.lock"

if [ -f "$FILE" ];
then
	exec apache2-foreground
else
	php /var/www/html/index.php installation docker_step1 $MONGO_HOST $MONGO_PORT $MONGO_DB $MONGO_USER $MONGO_PWD
	php /var/www/html/index.php installation docker_step2 $SAMF_USER $SAMF_PWD $SAMF_NAMEF $SAMF_NAMEL	
	touch $FILE
	chmod 755 /var/www/html
	chmod 755 /var/www/html/application/config
tee /var/www/html/application/helpers/sec_samf_helper.php <<EOF
<?php function sec_samf()
	{ } ?>
EOF
	exec apache2-foreground
fi

