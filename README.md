<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o Projeto

Blog de testes feito para avaliação na empresa Benfeitoria como demais testes pessoais.

## Recursos usados

PHP 7.4.7 (cli) (built: Jun  9 2020 13:34:30) ( NTS Visual C++ 2017 x64 )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies

Node v12.18.2

NPM 6.14.5

Composer version 2.0.9 2021-01-27 16:09:27

Banco de dados SQLITE3

Laravel versão 6 LTS (6.20)

## Etapas para rodar o projeto localmente

1 - Clonar o projeto para sua máquina local

2 - Dentro da pasta do projeto executar o comando 'composer install' pela linha de comando (Powershell, CMD, 'Linux Shell')

3 - Dentro da pasta do projeto executar o comando 'npm install'

4 - Usar o comando 'php artisan migrate' para criar a estrutura do banco de dados (tem um database.sqlite dentro da pasta database)

5 - Usar o comando 'php artisan db:seed' para popular o banco de dados com os dados de teste

6 - Para ver se todos os testes estão funcionando use o comando '.\vendor\bin\phpunit
'

7 - Usar o comando 'php artisan storage:link' isso criará um link simbólico para a pasta storage lá que serão armazenados as imagens salvas para novos posts.

8 - Usar o comando 'php artisan serve' isso irá rodar um servidor local exemplo http://localhost:8000 ou http://127.0.0.1 

## Para acessar o http://localhost:8000/admin ou http://127.0.0.1/admin

Quando rodamos o comando 'php artisan db:seed' eu crio o usuário 'admin@gmail.com' senha 'password' como eu criei uma tabela de roles eu atribuo o perfil 'administrator' para ele caso tente acessar com outro usuário você vai se logar mas vai ser redirecionado para tela de 'home'.

## Tabelas do banco de dados que criei

1 - categories

2 - category_post

3 - posts

4 - role_user

5 - roles

6 - users

## Alguns comandos executados

Site de refência -> https://laravel.com/docs/6.x/

"Criei arquivo na pasta database"
- database.sqlite

"Alterei o .env na linha do banco de dados só deixei "
- DB_CONNECTION=sqlite

"Instalando a autenticação"

- composer require laravel/ui "^1.0" --dev

- php artisan ui vue --auth

"Cria as visualizações"

- npm install

"Corrige algumas vulnerabilidades"

- npm audit fix

"Compila o css e o javascript"

- npm run dev

"Criando db seed"
- php artisan make:seeder UsersTableSeeder

"Instalei a dependência abaixo para resolver um problema do sqlite 'https://laravel.com/docs/6.x/migrations#modifying-columns'"
- composer require doctrine/dbal "^2.10.4"

"Criei o model Role"
- php artisan make:model Role

"Criei o RoleFactory"
- php artisan make:factory RoleFactory --model=Role

"Instalei o pacote de idiomas site 'https://github.com/Laravel-Lang/lang'"
"Copiei o idioma correspondente em vendor/laravel-lang/lang para a pasta lang"
- composer require laravel-lang/lang:~5.0

"Limpei o cache do config 'Configuration cache cleared!'"
- php artisan config:clear

"Limpei o cache 'Application cache cleared!'"
- php artisan cache:clear

"Criando link simbólico para o local onde serão salvos os arquivos"
- php artisan storage:link

"Criando validação para criação de Posts"
- php artisan make:request StorePostRequest

"Instalei o componente de paginação do vue.js para o Laravel"
- npm install laravel-vue-pagination


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
