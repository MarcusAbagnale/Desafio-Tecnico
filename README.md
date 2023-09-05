# Guia de Instalação do Projeto

Este guia irá ajudá-lo a configurar e executar o projeto Desafio-Tecnico em seu ambiente local.

## Pré-requisitos

- Git: Certifique-se de que o Git esteja instalado em sua máquina. Você pode baixá-lo em [https://git-scm.com/](https://git-scm.com/).

- MySQL: Instale o MySQL em sua máquina e certifique-se de que o servidor MySQL esteja em execução. Você pode baixar o MySQL em [https://www.mysql.com/](https://www.mysql.com/).

- PHP: Tenha o PHP instalado em sua máquina. Você pode baixar o PHP em [https://www.php.net/](https://www.php.net/).

## Passos de Instalação

Siga os seguintes passos para configurar e executar o projeto:

1. Clone o repositório:

    ```shell
    git clone https://github.com/MarcusAbagnale/Desafio-Tecnico.git
    ```

2. Acesse a pasta `bd` e execute o script SQL no MySQL:

    ```shell
    cd Desafio-Tecnico/bd
    mysql -u seu_usuario -p < script.sql
    ```

    Substitua `seu_usuario` pelo nome de usuário do MySQL quando solicitado.

3. Acesse a pasta `database` e configure as conexões de banco de dados:

    - Abra o arquivo `config.php` em um editor de texto e configure as informações de conexão com o banco de dados, como nome de usuário, senha e nome do banco de dados.

4. Inicie seu servidor PHP local. Dependendo da configuração do seu ambiente, você pode usar o servidor embutido do PHP:

    ```shell
    php -S localhost:8000
    ```

    Substitua `localhost:8000` pela porta e host desejados, se necessário.

5. Abra seu navegador da web e acesse o projeto de acordo com as configurações do PHP:

    - Por padrão, com o comando PHP acima, você pode acessar o projeto em [http://localhost:8000](http://localhost:8000).

Agora você deve ter o projeto Desafio-Tecnico funcionando em seu ambiente local.

## Contribuição

Se desejar contribuir para este projeto, sinta-se à vontade para criar um fork, fazer suas alterações e enviar um pull request.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).


