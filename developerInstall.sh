#!/bin/bash
echo "Criando Ambientes"

echo "Criando Back End"
echo ""

cd "back-end" &&
docker-compose up -d --build --force-recreate &&
cd src/ &&
cp .env.example .env &&
docker-compose run artisan key:generate &&
docker-compose run artisan migrate:fresh --seed &&

echo "Backend executando em: http://localhost:7000/"

echo "Criando Front End"
echo ""

cd ..
cd ..
cd "front-end"
docker-compose up