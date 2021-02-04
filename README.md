<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o Projeto

Blog de testes feito para avaliação na empresa Benfeitoria como demais testes pessoais.

## Observações

- Ao final disponibilizo a configuração que fiz para o .env mas cada máquina tem uma configuração então o melhor é você copiar o .env.example e alterar o que for necessário. O motivo do banco de dados não ter senha é que usei uma versão SQLITE local.

- Criei o Middleware Admin.php e o adicionei o middleware no Kernel.php para fazer a validação por Roles (perfis)


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

4 - Copie o arquivo .env.example na raiz da pasta e renomeie para .env altera a linha do DB_CONNECTION para DB_CONNECTION=sqlite isso indica a configuração da nossa conexão. Essas outras DB_HOST=127.0.0.1
DB_PORT=3306 , DB_DATABASE=laravel , DB_USERNAME=root , DB_PASSWORD= você pode comentar ou apagar.

5 - Usar o comando 'php artisan key:generate' essa chave é necessária para a questão de segurança na aplicação ela aparece dentro do arquivo .env na linha APP_ENV algo parecido com isso APP_KEY=base64:CY9EbZ69FWeJLCxthVl98h9XFGV0dlYun2ZrUrgfhs8=

6 - Dentro da pasta database que está na raíz da aplicação crie o arquivo database.sqlite se estiver no windows com o VS CODE clique com o botão direito na pasta escolha NEW FILE e nomeie o arquivo como database.sqlite

7 - Usar o comando 'php artisan migrate' para criar a estrutura do banco de dados (tem um database.sqlite dentro da pasta database)

8 - Usar o comando 'php artisan db:seed' para popular o banco de dados com os dados de teste

9 - Para ver se todos os testes estão funcionando use o comando '.\vendor\bin\phpunit
'

10 - Usar o comando 'php artisan storage:link' isso criará um link simbólico para a pasta storage lá que serão armazenados as imagens salvas para novos posts.

11 - Usar o comando 'php artisan serve' isso irá rodar um servidor local exemplo http://localhost:8000 ou http://127.0.0.1 

12 - Depois de usar o comando 'php artisan serve' abra o arquivo .env e atualize a linha APP_URL=http://localhost para ficar igual a url base que ele te mostrou exemplo APP_URL=http://localhost:8000

13 - Admin da aplicação  usuário 'admin@gmail.com' senha 'password'

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

## Arquivo de configuração .env (a título de exemplo estou colocando minha configuração mas lembre-se que deve fazer a sua)

APP_NAME=Laravel

APP_ENV=local

APP_KEY=base64:CWHgwED5xLd+dWiW/wszyvT0Euyz1ywbiaUdIgu/EwY=
APP_DEBUG=true

APP_URL=http://localhost:8000

LOG_CHANNEL=stack

DB_CONNECTION=sqlite

BROADCAST_DRIVER=log

CACHE_DRIVER=file

QUEUE_CONNECTION=sync

SESSION_DRIVER=file

SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1

REDIS_PASSWORD=null

REDIS_PORT=6379

MAIL_DRIVER=smtp

MAIL_HOST=smtp.mailtrap.io

MAIL_PORT=2525

MAIL_USERNAME=null

MAIL_PASSWORD=null

MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS=null

MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=

AWS_SECRET_ACCESS_KEY=

AWS_DEFAULT_REGION=us-east-1

AWS_BUCKET=

PUSHER_APP_ID=

PUSHER_APP_KEY=

PUSHER_APP_SECRET=

PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"

MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

## Endereços de rotas na aplicação

Use o comando 'php artisan route:list' para ver na linha de comando.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
