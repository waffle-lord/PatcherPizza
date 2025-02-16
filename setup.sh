#!/bin/bash

if [[ $1 == '' ]]; then
    echo '=== OPTIONS ==='
    echo '  --dev   	-> run the development server (for local developemnt only)'
    echo '  --watch 	-> run npm watch to update tailwinds files during development'
    echo '  --prod  	-> run the production server'
    echo '  --prod-init	-> setup the production server (only run once for initial setup)'
    exit
fi

if [[ $1 != '--dev' && $1 != '--watch' && $1 != '--prod' && $1 != '--prod-init' ]]; then
    echo 'invalid param, run ./setup.sh without any params for options'
    exit
fi

source .env

if [[ $1 == '--watch' ]]; then
    docker compose run --rm npm run watch
    exit
fi


docker compose down

if [[ $1 == '--dev' ]]; then
  read -p "Running dev setup will wipe / seed the database. Continue (y/[n])? " confirmDev

  if [[ $confirmDev != 'y' ]]; then
    exit
  fi
  docker compose down -v
fi

if [[ $1 == '--prod-init' ]]; then
  if [ -f .prod-init ]; then
    echo 'You have already initialized production. You will need to delete .prod-init to continue. This is not advised'
    echo 'You should probably run `./setup.sh --prod` instead'
    echo '!!THIS WILL WIPE YOUR DB!!'
    echo 'Issue command directly if you do not want that to happen!'
    exit
  fi
  docker compose down -v
  echo ' -> prod-init'
  touch .prod-init
fi

if [ ! -f ./src/database/database.sqlite ]; then
    touch ./src/database/database.sqlite
    echo ' -> sqlite db created'
fi

echo ' -> copying .env to ./src/'
cp .env ./src/.env


echo ' -> starting build'
docker compose build --no-cache

echo ' -> starting containers'
docker compose up -d

echo ' -> running composer install'
docker compose run --rm composer install

echo ' -> generating key'
docker compose run --rm composer php /var/www/html/artisan key:generate

echo ' -> running npm install'
docker compose run --rm npm i

echo ' -> running npm build'
docker compose run --rm npm run build

if [[ $1 == '--dev' ]]; then
  echo ' -> migrate / seed db'
  docker compose exec php php /var/www/html/artisan migrate:fresh --seed
elif [[ $1 == '--prod-init' ]]; then
  echo ' -> fresh production db'
  docker compose exec php php /var/www/html/artisan migrate:fresh
else
  echo ' -> migrate only'
  docker compose exec php php /var/www/html/artisan migrate
fi

if [ ! -h ./src/public/storage ]; then
  echo ' -> making storage link'
  docker compose run --rm composer php /var/www/html/artisan storage:link
else
  echo ' -> storage link already exists'
fi

echo ' -> updating file ownership'
docker compose run --rm php chown -R :www-data /var/www/html
docker compose run --rm php chmod -R 775 /var/www/html/storage
docker compose run --rm php chmod -R 770 /var/www/html/database
docker compose run --rm php chmod 660 /var/www/html/database/database.sqlite

if [[ $1 == '--prod' || $1 == '--prod-init' ]]; then
  echo ' -> optimizing'
  docker compose run --rm composer php artisan optimize
fi

if [[ $1 == '--prod-init' ]]; then
  echo ':: Account creation ::'
  read -p 'name: ' name 
  read -p 'email: ' email
  read -s -p 'password: ' psword
  echo ''
  echo ' -> adding account'
  docker compose run --rm php php /var/www/html/artisan tinker --execute="App\Models\User::factory()->create(['name' => '$name', 'email' => '$email', 'password' => Illuminate\Support\Facades\Hash::make('$psword')])"
  echo ' -> account created'
fi

echo ' -> setup done :)'
echo ''
echo "Server      : $APP_URL"

if [[ $1 == '--dev' ]]; then
  echo 'dev account : test@example.com | password'
fi
