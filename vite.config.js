import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import dotenv from 'dotenv';
dotenv.config();
export default defineConfig({
    base: process.env.APP_URL || '/',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        target: 'modules',
        mode: 'production',
        copy: [
            {
                // کپی کردن پوشه icons در resources به public
                from: 'resources/images/icons',
                to: 'icons',
            },
        ],
    }
});
