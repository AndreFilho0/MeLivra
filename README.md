# Documentação de Setup da Aplicação

## Pré-requisitos

Para rodar esta aplicação na sua máquina, você precisará ter instalados os seguintes softwares:

- [Node.js](https://nodejs.org) (versão LTS recomendada)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/install/)

Verifique se todas as dependências estão instaladas executando os seguintes comandos:

```bash
node -v
docker -v
docker-compose -v
```

```
git clone <URL-do-repositório>
cd <nome-do-diretório-clonado>
```
# use uma nova branch para colocar sua contribuição 
```
git checkout -b <nome-da-branch>
```

# Configuração do ambiente
Copie o arquivo de exemplo .env para criar o seu arquivo .env:
```
cp .env.example .env
```
# Construindo os containers
Agora você pode buildar a aplicação usando Docker:

```
docker-compose up --build -d
```

# Instalação das dependências do PHP
Após subir os containers, entre no container da aplicação e instale as dependências PHP com o Composer:

```
docker-compose exec app composer install

```

# Executando as migrações
Para preparar o banco de dados, rode as migrações do Laravel:

```
docker-compose exec app php artisan migrate

```

# Rodando as Seeds
Se você precisar popular o banco de dados com dados iniciais, rode as seeds , atenção: talvez a parte dos professores por ser grande tem que rodar ela separada :

```
docker-compose exec app php artisan db:seed
```

# Instalando as dependências do Node.js
Agora, você precisará instalar as dependências do Node.js:

```
npm install
npm run dev
```



