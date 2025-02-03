import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['/var/www/html/resources/css/app.css', '/var/www/html/resources/js/app.js'],
            refresh: true,
        }),
    ],
});
