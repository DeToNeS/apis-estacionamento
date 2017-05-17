# APIS - Estacionamento
Gerenciador de entrada e saida de estacionamento.

## Instalação

###### Ambiente de desenvolvimento
Instale o Docker e Docker compose.

###### Estrutura do projeto
Clone o projeto na raiz, neste exemplo a pasta raiz será será <b>c:\www</b>, ficando desta maneira <b>c:\www\apis-estacionamento</b> o path do projeto.
> git clone https://github.com/DeToNeS/apis-estacionamento.git

###### Ambiente
Clone o ambiente, https://github.com/DeToNeS/webdev na raiz, neste exemplo a pasta do ambiente será <b>c:\apis-estacionamento</b>.
> git clone https://github.com/DeToNeS/webdev.git

Execute o comando dentro da pasta do ambiente:
> docker-compose up -d --build

###### Banco de dados
Dentro da pasta do projeto, copie e renomeie o arquivo .env.example para .env e edit o mesmo com as configurações abaixo:
> DB_CONNECTION=pgsql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=dev<br>
DB_USERNAME=dev<br>
DB_PASSWORD=dev<br>

###### Configuração do amabiente
Na pasta do ambiente, acesse o terminal executando o comando abaixo
> docker exec -i -t webdev_php-apache_1 bash

Build o Laravel
* Composer
> composer install
* Node
Instale as dependências do npm
> npm install
* Artisan
> php artisan key:generate <br>
php artisan migrate <br>
php artisan db:seed

* Gulp
> npm install -g gulp <br>
> gulp

* PHPUnit
> phpunit

##### Versões utilizadas no projeto
* Laravel 5.3
* Node v6.9.4
