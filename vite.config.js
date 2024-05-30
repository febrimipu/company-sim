import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // 'resources/sass/app.scss',
                // 'resources/css/admin.css',
                // 'resources/css/tabler.min.css',
                // 'resources/css/tabler-flags.min.css',
                // 'resources/css/tabler-payments.min.css',
                // 'resources/css/tabler-vendors.min.css',
                // 'resources/css/demo.min.css',
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
