import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const vitePort = 5173;

const isCodespaces = !!process.env.CODESPACE_NAME;

const codespacesHost = isCodespaces
    ? `${process.env.CODESPACE_NAME}-${vitePort}.${process.env.GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN}`
    : null;

const devServerHost = isCodespaces
    ? codespacesHost
    : 'localhost';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: vitePort,
        strictPort: true,
        cors: true,

        origin: isCodespaces
            ? `https://${devServerHost}`
            : `http://${devServerHost}:${vitePort}`,

        hmr: isCodespaces
            ? {
                protocol: 'wss',
                host: devServerHost,
                clientPort: 443,
            }
            : {
                protocol: 'ws',
                host: devServerHost,
                clientPort: vitePort,
            },
    },

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});