#!/bin/bash

echo "🚀 Construyendo y levantando los contenedores..."
docker compose -f stack-compose.yml up --build -d

echo "⏳ Esperando 10 segundos a que la base de datos arranque..."
sleep 10

echo "⚙️ Instalando dependencias de Laravel..."
docker exec -it laravel composer install

echo "⚙️ Instalando dependencias de NPM..."
docker exec -it laravel npm i

echo "⚙️ IBuildeando el fron.."
docker exec -it laravel npm run build

echo "🔑 Generando clave de aplicación..."
docker exec -it laravel php artisan key:generate

echo "🧬 Ejecutando migraciones..."
docker exec -it laravel php artisan migrate

echo "✅ Listo. Laravel corriendo en http://localhost:8000"
