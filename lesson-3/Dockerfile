FROM ubuntu
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get clean && apt-get -y update && apt-get install -y locales curl software-properties-common git \
  && locale-gen en_US.UTF-8
RUN apt-get install -y nginx nano

RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php7.3-bz2 php7.3-cli php7.3-common php7.3-curl \
                php7.3-cgi php7.3-dev php7.3-fpm php7.3-gd php7.3-gmp php7.3-imap php7.3-intl \
                php7.3-json php7.3-ldap php7.3-mbstring php7.3-mysql \
                php7.3-odbc php7.3-opcache php7.3-pgsql php7.3-phpdbg php7.3-pspell \
                php7.3-readline php7.3-recode php7.3-soap php7.3-sqlite3 \
                php7.3-tidy php7.3-xml php7.3-xmlrpc php7.3-xsl php7.3-zip \
                php-tideways php-mongodb
RUN sed -i "s/;date.timezone =.*/date.timezone = UTC/" /etc/php/7.3/cli/php.ini
RUN sed -i "s/;date.timezone =.*/date.timezone = UTC/" /etc/php/7.3/fpm/php.ini

RUN echo 'server {' > /etc/nginx/sites-available/default \
 && echo '    listen 80 default_server;' >> /etc/nginx/sites-available/default \
 && echo '    listen [::]:80 default_server;' >> /etc/nginx/sites-available/default \
 && echo '    root /var/www/html;' >> /etc/nginx/sites-available/default \
 && echo '    index index.php index.html index.htm index.nginx-debian.html;' >> /etc/nginx/sites-available/default \
 && echo '    server_name _;' >> /etc/nginx/sites-available/default \
 && echo '    location / {' >> /etc/nginx/sites-available/default \
 && echo '        try_files $uri $uri/ =404;' >> /etc/nginx/sites-available/default \
 && echo '    }' >> /etc/nginx/sites-available/default \
 && echo '    location ~ \.php$ {' >> /etc/nginx/sites-available/default \
 && echo '        include snippets/fastcgi-php.conf;' >> /etc/nginx/sites-available/default \
 && echo '        fastcgi_pass unix:/run/php/php7.3-fpm.sock;' >> /etc/nginx/sites-available/default \
 && echo '    }' >> /etc/nginx/sites-available/default \
 && echo '}' >> /etc/nginx/sites-available/default \
 && echo '<?php phpinfo();' >> /var/www/html/index.php \
 && echo '#!/bin/bash' >> /root/start.sh \
 && echo '/usr/sbin/service php7.3-fpm start' >> /root/start.sh \
 && echo '/usr/sbin/service nginx start' >> /root/start.sh \
 && echo 'tail -f /dev/null' >> /root/start.sh \
 && chmod +x /root/start.sh 

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /root
CMD ["./start.sh"]

