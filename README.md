# PatcherPizza

a dumb thing.

Registration is off on this server.

To create an account run user factory create in tinker:

1. docker compose run --rm php php /var/www/html/artisan tinker
2. App\Models\User::factory()->create(['name' => 'username', 'email' => 'username@example.com', 'password' => Illuminate\Support\Facades\Hash::make('password')])
3. exit
