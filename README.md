# QUIZ GAME

## Descrição

Jogo de Perguntas e Respostas de mesmo seguimento que o jogo mobile “Show do Milhão”.

Jogo em desenvolvimento e sendo testado no servidor embutido do PHP. Onde os requests são enviados para o arquivo principal "index.php".
Pode-se obter os mesmos resultados com apache, configurando o servidor internamente ou externamente, usando .htaccess que, apesar de uma perda mínima de performance, compensa muito na flexibilidade do projeto.

## Requisitos Funcionais

- [x] O jogo deve ter login
- [x] O jogo deve armazenar o maior score do usuário logado
- [x] O jogo deve mostrar perguntas de forma aleatória
- [x] O jogo deve ter categorias para as perguntas (português, matemática e etc)
- [x] O jogo deve permitir que usuários administradores cadastrem perguntas e respostas
- [ ] O jogo deve mostrar perguntas em níveis de dificuldade
- [ ] O jogo deve ter 5 níveis de dificuldade com 5 perguntas cada, totalizando 25 perguntas

## Clonando o Jogo

### Ferramentas Necessárias

1. PHP
2. Composer
3. MySQL/MariaDB

### Instruções

Abra o cmd/terminal e execute o comando abaixo:

    git clone https://github.com/yuri97real/Quiz-Game-em-PHP-MVC.git

Navegue até a pasta do projeto e baixe as dependências, utilizando o composer.

    cd Quiz-Game-em-PHP-MVC/
    composer update

Renomeie o arquivo "config.example.php" para "config.example" e informe as configurações do seu banco de dados.

Depois de seguir os passos acima, será possível executar o jogo. Você deve iniciá-lo na pasta <strong>"public"</strong>.

Se estiver usando o <a href="https://www.php.net/manual/pt_BR/features.commandline.webserver.php">servidor embutido do PHP</a>, você pode executar o camando abaixo:

    php -S localhost:3333 -t public

No primeiro uso, você será redirecionado para página de edição de usuário. Você pode alterar os dados do usuário padrão que foi criado automaticamente.

1. "admin@gmail.com"
2. "123456"

Salve tudo e pronto!

## Rotas Principais

    CADASTRAR JOGADOR
    "/cadastro/novoJogador"

    ATUALIZAR JOGADOR
    "/cadastro/atualizarJogador"

    CADASTRAR QUIZ
    "/cadastro/novoQuiz"

    FAZER LOGIN
    "/"

    HOME
    "/home"

    INICIAR JOGO
    "/home/iniciar"

    LISTAR SCORES
    "/home/scores"