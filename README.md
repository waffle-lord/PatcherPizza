# PatcherPizza

A dumb thing that is sure to be a mistake ...

# Setup

1. Copy the `.env.example` file to `.env`
2. update the `USER_ID` and `GROUP_ID` variables with the user to use
4. run `setup.sh` with options (see options below)

# Setup.sh Options

## For Development
- `setup.sh --dev` :: rebuild all containers and migrate / seed the database
- `setup.sh --watch` :: runs `npm run watch` to update tailwinds css

## For Production
- `setup.sh --prod-init` :: initial setup for production
- `setup.sh --prod` :: start existing production server

To update production:
- drop any git changes to local files (it will only be permissions / configs that are created when the server starts)
- pull the main branch
- run `./setup.sh --prod`

# Adding Additional Users
Registration is off on this server.

To create an account run user factory create in tinker:
```bash
# enter the tinker environment
docker compose run --rm php php /var/www/html/artisan tinker
# add the user (update info as needed)
App\Models\User::factory()->create([
    'name' => 'username',
    'email' => 'username@example.com',
    'password' => Illuminate\Support\Facades\Hash::make('password')
])
# leave tinker
exit
```
