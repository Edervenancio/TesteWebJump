# Projeto desenvolvedor Backend na Web Jump.
Teste criado pela Web Jump para a contratação de novos desenvolvedores backend.

# O teste
O desafio é desenvolver um sistema de gerenciamento de produtos. Esse sistema será composto de um cadastro de produtos e categorias. Os requisitos desse sistema estão listados nos tópicos abaixo.
Não existe certo ou errado, queremos saber como você se sai em situações reais como esse desafio.

# Sobre o projeto

O projeto foi feito com a versão 8.0 do PHP, HeidiSQL(Mariadb) e a versão 2.4.4 do Composer. Utilizamos o psr-4 para que houvesse o carregamento dinâmicos das classes, para que não fosse necessário realizar várias importações. Quanto a organização do projeto, optamos pela arquitetura MVC e adjunto disso, o SOLID para que pudessemos padronizar toda a estrutura de código do projeto. Ao que condiz com a execução da aplicação, acabou sendo preferível o uso de query builders para a realização de alguns métodos dentro da mesma.

# Requisitos & tecnologias usadas no desenvolvimento.
<ol>
<li>Um ambiente de desenvolvimento, nesse caso utilizamos o <a href="https://www.apachefriends.org/download.html">XAMPP</a> para atuar como nosso servidor local.</li>
<li><a href="https://www.php.net/manual/en/install.php">PHP</a></li>
<li><a href="https://getcomposer.org/">Composer</a></li>
<li>Um banco de dados, nesse caso, usamos <a href="https://www.heidisql.com/">Heidi SQL</a></li>
<li>IDE ou editor de texto de sua preferencia, como o <a href="https://code.visualstudio.com/download">VSCODE</a></li>
</ol>

# Instruções para rodar a aplicação
- Para realizar a aplicação, espera-se que tenha os requisitos supracitados.
<ol>
<li>Execute seu ambiente de desenvolvimento, nesse caso, usamos o XAMPP como servidor local para nossa aplicação.</li>
<li>Inicialize e crie seu banco de dados. Você pode obtê-lo na pasta "database"</li>
<li>Clone esse projeto, e abra-o no VSCODE ou outra aplicação de sua preferência.</li>
<li>Importe os arquivos CSV na pasta assets de acordo com o seu banco de dados.</li>
<li>Após iniciado o projeto, execute o comando <b>composer update</b> para garantir que tenha todas as dependências em seu projeto.</li>
<li>Logo após, execute o <b>composer dumpautoload</b> para que haja o carregamento das classes.</li>
<li>Realize a execução do arquivo Index.php e aproveite a aplicação.</li>
</ol>





