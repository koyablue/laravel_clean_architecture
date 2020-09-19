cd /var/www/html/projdir
composer install -o

ENV_FILE=".env"

if [ -f ${ENV_FILE} ]; then
  echo "ファイルが存在します"
else
  cp .env.local ${ENV_FILE}
fi

php artisan config:cache
php artisan storage:link

apache2-foreground
