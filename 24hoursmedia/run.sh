#!/bin/sh
source /24hoursmedia/.env.defaults
echo "parsing php configuration"
sh /24hoursmedia/utils/env-subst.sh /24hoursmedia/config/php.ini /etc/php7/conf.d/zzz_custom.ini
echo "-------"
echo "/etc/php7/conf.d/zzz_custom.ini:"
cat /etc/php7/conf.d/zzz_custom.ini
echo "-------"
echo "starting php-fpm"
/usr/bin/supervisord -c /etc/supervisor/supervisord.conf
