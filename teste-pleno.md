[![](https://meeventos.com.br/images/logo.png)](https://meeventos.com.br)

# Comandos

Rodar os seguintes comando para popular o banco de dados.
1) Criação das tabelas:
 - php artisan migrate --path=database/migrations/2023_05_12_021258_create-usuarios.php
 - php artisan migrate --path=database/migrations/2023_05_12_020833_create-empresas.php
 - php artisan migrate --path=database/migrations/2023_05_12_021249_create-categorias.php

2)popular tabelas:
 - php artisan db:seed

## Instruções

Desafiamos você a criar uma aplicação web usando o framework PHP Laravel e um banco de dados relacional (Mysql) que seja um catalogo de empresas.

Sua aplicação deverá conter:

1) Criar um banco de dados com as seguintes tabelas:
 - Empresas
 - Categorias
 - Usuarios

2) Criar as relações entre as tabelas:
 - Um usuario pode ter várias empresas 
 - Uma empresa pode ter várias categorias
 - Uma categoria pode ter várias empresas
 - Uma empresa pertence a um usuario

3) Criar as seguintes funcionalidades:
 - Cadastro, edição, exclusão e listagem de empresas
 - Cadastro, edição, exclusão e listagem de categorias
 - Cadastro, edição, exclusão e listagem de usuarios
 - Filtragem e ordenação das empresas por categoria, nome e cidade
 - Validação dos campos obrigatórios
 - Paginação de 20 itens por página

## Banco de dados

- O banco de dados deve ser criado utilizando Migrations do framework Laravel, e também utilizar Seeds e Factorys para popular as informações no banco de dados.

## Tecnologias a serem utilizadas

Devem ser utilizadas as seguintes tecnologias:

- HTML
- CSS
- Javascript
- Framework Laravel (PHP)
- Mysql

## Entrega

- Para iniciar o teste, faça um fork deste repositório; **Se você apenas clonar o repositório não vai conseguir fazer push.**
- Crie uma branch com o seu nome completo;
- Altere o arquivo teste-pleno.md com as informações necessárias para executar o seu teste (comandos, migrations, seeds, etc);
- Depois de finalizado, envie-nos o pull request;

## Bônus (Não Obrigatório)

- API Rest JSON para todos os CRUDS listados acima.
- Permitir deleção em massa de itens nos CRUDs.
- Permitir que o usuário mude o número de itens por página.
- Implementar autenticação de usuário na aplicação.

## O que iremos analisar

- Organização do código;
- Aplicação de design patterns;
- Aplicação de testes;
- Separação de módulos e componentes;
- Legibilidade;

### Boa sorte!
