FROM ggbr12/php-laravel:5.7

ADD ./config/php/php.ini /usr/local/etc/php/php.ini

ADD ./config/vhosts /etc/apache2/sites-enabled

ADD ./www/ /var/www/html/




