import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build', // Força usar 'build' em vez de '.vite'
        }),
    ],
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: 'manifest.json', // Força o nome correto
        assetsDir: 'assets',
        rollupOptions: {
            output: {
                manualChunks: undefined,
                assetFileNames: 'assets/[name]-[hash][extname]',
                chunkFileNames: 'assets/[name]-[hash].js',
                entryFileNames: 'assets/[name]-[hash].js',
            }
        }
    },
    base: './',
});