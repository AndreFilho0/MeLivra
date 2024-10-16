#!/bin/bash

# Passo 1: Verificar se Docker está instalado
if ! [ -x "$(command -v docker)" ]; then
  echo "Erro: Docker não está instalado." >&2
  exit 1
fi

if ! [ -x "$(command -v node)" ]; then
  echo "Erro: Node não está instalado." >&2
  exit 1
fi

if ! [ -x "$(command -v docker compose)" ]; then
  echo "Erro: Docker Compose não está instalado." >&2
  exit 1
fi

# Passo 2: Arrumando o env 
echo "Configurando arquivos .env ..."
cp .env.example .env

# Passo 3: Construindo e Iniciando os Contêineres Docker
echo "Construindo e iniciando os contêineres Docker..." 
docker compose up --build -d

# Passo 4: Instalar as dependências usando Composer
echo "Instalando dependências do projeto..."
docker compose exec app composer install

# Passo 5: Criar as tabelas no banco de dados e preencher com dados padrão
echo "Migrando e populando o banco de dados..."
docker compose exec app php artisan migrate


# Passo 6: Rodar as Seeds
echo "Executando as seeds para o banco de dados, exceto a parte dos professores..."
docker compose exec app php artisan db:seed

echo "Executando as seeds para as tabelas dos professores..."
docker compose exec app php artisan db:seed --class=ProfessorsTableSeeder

# Passo 7: Instalando as dependências do Node.js
echo "Instalando as dependencias do node.js..."
npm install
npm run dev

echo "Configuração completa!"