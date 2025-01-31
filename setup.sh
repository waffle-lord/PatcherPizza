#!/bin/bash

if [[ $1 == '--dev' ]]; then
  read -p "Running dev setup will wipe / seed the database. Continue (y/[n])? " confirmDev

  if [[ $confirmDev != 'y' ]]; then
    exit
  fi
fi

if [[ $1 == --prod ]]; then
  if [ -f .prod-init ]; then
    echo 'You have already initialized production. You will need to delete .prod-init to continue. This is not advised'
    echo '!!THIS WILL WIPE YOUR DB!!'
    echo 'Issue command directly if you do not want that to happen!'
    exit
  fi
fi

touch .prod-init

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

# always run artisan in composer container, to ensure composer is available to it when needed
docker compose run --rm composer php artisan key:generate

echo ' -> running composer install'
docker compose run --rm composer install

echo ' -> running npm install'
docker compose run --rm npm i

echo ' -> running npm build'
docker compose run --rm npm run build

if [[ $1 == '--dev' ]]; then
  echo ' -> migrate / seed db'
  docker compose exec php php /var/www/html/artisan migrate:fresh --seed
elif [[ $1 == '--prod' ]]; then
  echo ' -> fresh production db'
  docker compose exec php php /var/www/html/artisan migrate:fresh
else
  echo ' -> migrate only'
  docker compose exec php php /var/www/html/artisan migrate
fi

if [ -f ./src/public/storage ]; then
  docker compose run --rm composer php artisan storage:link
else
  echo ' -> storage link already exists'
fi

echo ' -> updating file ownership'
docker compose run --rm php chown -h www-data:www-data /var/www/html/public/storage

if [[ $1 == '--prod' ]]; then
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
