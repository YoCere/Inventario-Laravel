import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: true, // Agrega esta línea para forzar HTTPS
        hmr: {
            host: 'inventario-laravel-production.up.railway.app', // Agrega tu dominio aquí
            protocol: 'wss', // Cambia a 'wss' (WebSocket Secure) para HTTPS
        },
    },
});