# QUIZ GAME

Jogo de Perguntas e Respostas de mesmo seguimento que o jogo mobile “Show do Milhão”.

Jogo em desenvolvimento e sendo testado no servidor embutido do PHP. Onde os requests são enviados para o arquivo principal "index.php".
Pode-se obter os mesmos resultados com apache, configurando o servidor internamente ou externamente, usando .htaccess que, apesar de uma perda mínima de performance, compensa muito na flexibilidade do projeto.

Requisitos Funcionais

    O jogo deve ter login [x]
    O jogo deve armazenar o maior score do usuário logado [x]
    O jogo deve mostrar perguntas de forma aleatória [x]
    O jogo deve ter categorias para as perguntas (português, matemática e etc) [x]
    O jogo deve permitir que usuários administradores cadastrem perguntas e respostas [x]
    O jogo deve mostrar perguntas em níveis de dificuldade []
    O jogo deve ter 5 níveis de dificuldade com 5 perguntas cada, totalizando 25 perguntas []

Rotas Principais

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

Clonar Jogo

    - Para rodar o jogo na sua máquina, crie o banco e as tabelas necessárias disponíveis no documento "database-config.sql".
    - Abra o cmd ou terminal e navegue até a pasta do projeto. Lá, utilize o comando "composer update" para baixar os pacotes e dependências.
    - A pasta root desse jogo é a "public", ou seja, configure seu servidor para iniciar lá dentro.
    - As configurações de banco de dados estão em "app/core/Model", com o padrão sgbd = "mysql", host = "localhost", usuário = "root", senha = "".
    - Para entrar no jogo como admin, basta informar na tela de login o email "admin@gmail.com" e senha "123456". Depois de logado, você pode mudar os dados desse usuário na aba "Usuário" da barra superior.
