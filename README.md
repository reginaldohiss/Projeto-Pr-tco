
### Passo a passo
Clone Repositório
```sh
git clone https://github.com/reginaldohiss/Projeto-Pr-tco.git
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Projeto"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up --build -d
```


Acessar o container
```sh
docker exec -it [NOME_CONTAINER] /bin/bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Execução de migrations
```sh
php artisan migrate
```


Gerar usuário padrão 
```sh
php artisan db:seed
```

Credênciais de acesso
```sh
email -> admin@gmail.com
senha -> 12345678
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
