#!/bin/bash
echo "Criando Ambientes"

echo "Criando Back End"
echo ""

cd "back-end" &&
docker-compose up -d --build &&
docker-compose run composer install &&
cd src/ &&
cp .env.example .env &&
docker-compose run artisan key:generate &&
docker-compose run artisan migrate:fresh --seed &&

echo "Backend executando em: http://localhost:7000/"
echo ""
echo ""

echo "Criando Front End"
echo ""

cd ..
cd ..
cd "front-end"
npm install 
npm run serve