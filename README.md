# PatcherPizza

A dumb thing that is sure to be a mistake ...

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
