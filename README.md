# Teste para vaga de desenvolvedor PHP

## Vídeo demonstrativo: https://www.youtube.com/watch?v=4Dyb38fyPaY

<hr/>

## Requisitos:
-> PHP instalado;  
-> Composer instalado;

# Instruções para rodar o projeto

## Execute o seguinte comando no diretório de projetos da sua máquina:

```sh
git clone https://github.com/Dudu671/aluguel-veicular.git
```

<hr/>

## Crie um arquivo chamado .env na raíz do projeto. Ele conterá as variáveis de ambiente com os parâmetros de conexão ao banco de dados. Crie um banco de dados no MySQL e passe as variáveis de conexão neste arquivo. Exemplo:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:tQUXgh7HcthdZwqr3fZXOiu6iDe7vhb+EkGMcLzrq5w=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=NOME DO BANCO DE DADOS
DB_USERNAME=SEU USUÁRIO DO BANCO DE DADOS
DB_PASSWORD=SUA SENHA DO BANCO DE DADOS

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

## Execute os seguintes comandos no diretório do projeto:
```sh
composer install
```
```sh
php artisan migrate
```
```sh
php artisan storage:link
```
```sh
php artisan serve
```

<hr/>

## Pronto! Tudo deve estar funcionando. Caso negativo, é provável que seja um configuração do PHP, tendo em vista que é um projeto local e as configurações de ambiente variam. Neste caso, sugiro que busquem informações sobre os erros para resolvê-los. O problema mais comum tange as extensões do PHP. Para resolver, basta procurar o arquivo php.ini com o seguinte comando no prompt de comando:
```sh
php -i|find/i"configuration file"
```
## Acesse o arquivo php.ini e habilite as seguintes extensões (removendo o ; no começo da linha):
```
extension=fileinfo
extension=mysqli
extension=pdo_mysql
```

<hr/>

## Para acessar o projeto no navegador, basta acessar http://127.0.0.1:8000.

<hr/>

Eduardo R. de Matos - eduardoooax@gmail.com
