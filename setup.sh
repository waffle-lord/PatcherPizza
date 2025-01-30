#!/bin/bash
source .env

echo copying .env to ./src/
cp .env ./src/.env

docker compose build --no-cache

docker compose up -d

# always run artisan in composer container, to ensure composer is available to it when needed
docker compose run --rm composer php artisan key:generate

docker compose run --rm composer install

docker compose run --rm npm i

docker compose run --rm npm run build

docker compose exec php php /var/www/html/artisan migrate:fresh

docker compose run --rm composer php artisan storage:link

docker compose run --rm php chown -h www-data:www-data /var/www/html/public/storage

