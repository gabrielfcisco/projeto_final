
# Projeto Final 

### Passo a passo
Clone Repositório criado a partir do template, entre na pasta e execute os comandos abaixo:

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8080

DB_PASSWORD=root
```


Suba os containers do projeto
```sh
docker compose up -d
```


Acessar o container
```sh
docker compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations e o seeder
```sh
php artisan migrate --seed
```

Acesse o projeto
[http://localhost:8080](http://localhost:8080)

Acesse o phpmyadmin
[http://localhost:8081](http://localhost:8081)

##User Professor
email: Xastre@exemple.com
senha: password

##User Aluno
email: eduardo@exemple.com
senha: password

##User Secretaria
email: secretaria@sec.com
senha: password
