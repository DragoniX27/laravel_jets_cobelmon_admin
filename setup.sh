#!/bin/bash

echo "🚀 Levantando contenedores necesarios (bd, redis, mongodb, laravel)..."
docker compose -f stack-compose.yml build --no-cache laravel
docker compose -f stack-compose.yml up -d redis db mongodb laravel

echo "⏳ Esperando 10 segundos a que la base de datos arranque..."
sleep 10

echo "⚙️ Instalando dependencias de Laravel..."
docker exec -it laravel composer install

echo "⚙️ Instalando dependencias de NPM..."
docker exec -it laravel npm install

echo "⚙️ Construyendo el frontend..."
docker exec -it laravel npm run build

echo "🔑 Generando clave de aplicación..."
docker exec -it laravel php artisan key:generate

echo "🧬 Ejecutando migraciones..."
docker exec -it laravel php artisan migrate:fresh --seed

echo "✅ Laravel corriendo en http://localhost:8000"

echo "🚀 Levantando el servidor de Minecraft..."
docker compose -f stack-compose.yml up -d minecraft

echo "✅ Minecraft corriendo"
