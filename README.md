# Descrição

API desenvolvida para o cadastro de estabelecimentos e categorias, utilizando PHP, Laravel 8.0, Mysql e PHPUnit para os testes unitários.


# Instalação

Para a instalação da API, utilize primeiramente o comando:

    docker-compose up -d
   Após a criação e inicialização dos containers, utilize o comando a seguir para a inicialização do servidor
	   

    docker exec -it container_jairo service apache2 start

Após isso, é necessário a instalação das bibliotecas do Laravel:

    docker attach container_jairo 

Após acessar o docker, use o comando:

    cd var/www/html && composer update && composer install
   Pronto, agora o sistema de APIs já pode ser utilizado.

## Uso

Quando houver necessidade de executar depois de ter instalado a API, o sistema pode ser inicializado somente utilizando o comando:
```

    docker-compose up -d && docker exec -it container_jairo service apache2 start 

```

## Banco de Dados

Para a criação das tabelas, ao estar na pasta **html**, utilizar o comando:

    php artisan migrate
  