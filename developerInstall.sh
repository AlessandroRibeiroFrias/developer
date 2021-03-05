#!/bin/bash
echo "Criando Ambientes"
echo ""

cd /back-end &&
docker-compose up -d --build &&
cd src/ &&
cp .env.example .env &&
docker-compose run artisan key:generate &&
docker-composer run artisan migrate:fresh --seed &&

echo "Backend executando em: http://localhost:7000/"
read -p "Pressione um botão para continuar..."