import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import laravel from 'tabler-ui';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                // 'resources/js/app.js',
                // 'resources/sass/app.scss',
                'resources/sass/tabler.scss',
                'resources/js/tabler.js',

            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@charset "UTF-8";`,
            },
        },
    },
});
