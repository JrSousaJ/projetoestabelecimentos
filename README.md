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
## API

Para utilização da API, importar o arquivo **Insomnia_2021-04-03.json** para disparar as requisições.

## Banco de Dados
Já existe uma base de dados no projeto, porém, caso queira criar outro banco de dados, rode o seguinte comando dentro da pasta **html** do container:

    php artisan migrate
  
