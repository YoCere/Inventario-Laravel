import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command, mode }) => {
    return {
        plugins: [
            laravel({
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
        // Solo habilitar el servidor HTTPS y HMR si estás en modo de desarrollo
        server: command === 'serve' && mode === 'development' ? {
            https: true, // Forzar HTTPS solo en desarrollo
            hmr: {
                host: 'inventario-laravel-production.up.railway.app', // Tu dominio para HMR en desarrollo
                protocol: 'wss', // Usar WebSocket seguro (wss)
            },
        } : {},
    }
});