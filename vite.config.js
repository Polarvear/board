import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue"; //add this line
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(), // write this
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

