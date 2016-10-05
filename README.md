# PLS - UFMS 

Esse sistema foi desenvolvido utilizando o framework cakephp (http://cakephp.org/) na linguagem PHP, tal framework utiliza o padrão MVC para desenvolvimento web. O banco de dados utilizado é o MySQL (https://www.mysql.com/) em um servidor APACHE (http://apache.org/). Para estilização e interação amigável com o usuário foram usados os frameworks bootstrap (http://getbootstrap.com/) na linguagem CSS, jquery (https://jquery.com/) e angularJS (https://angularjs.org/), ambas da linguagem javascript. 

## Requerimentos

* Servidor HTTP. Por exemplo Apache. Com o módulo mod_rewrite ativado.
* PHP 5.5.9 ou mais atual.
* extensão mbstring do PHP 
* extensão intl do PHP
* MySQL (5.1.10 ou mais atual)

## Instalação e configuração

Crie um banco de dados MySQL UTF-8 e execute o script sql `config/SQL/sigepls.sql`.

Edite o arquivo `webroot/js/config.js` indicando a URL base do sistema, de acordo com seu servidor, por exemplo `baseUrl: "http://localhost/sigepls/"`

Edite o arquivo `config/app.php` conforme sua necessidade. Nele estão algumas configurações iniciais do sistema, neste arquivo contém as configurações de conexão com o banco de dados, por padrão ele conecta ao banco com as seguintes informações:

```
'host' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'sigepls',
'encoding' => 'utf8',
```

## Acessando o Sistema

Um usuário padrão está disponível:

```
Usuário: admin
Senha: admin
```