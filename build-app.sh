#!/bin/bash
set -e

# 1) Compila os assets do Vite
# se preferir, troque npm i por npm ci (se tiver package-lock)
npm i
npm run build

# 2) Limpa e cria caches do Laravel (melhora boot)
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# (opcional) Link de storage, se sua app usa uploads públicos
# php artisan storage:link || true
