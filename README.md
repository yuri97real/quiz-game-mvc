#QUIZ GAME

Jogo de Perguntas e Respostas de mesmo seguimento que o jogo mobile “Show do Milhão”.

Requisitos Funcionais

    O jogo deve ter login [x]
    O jogo deve armazenar o maior score do usuário logado []
    O jogo deve mostrar perguntas de forma aleatória [x]
    O jogo deve ter categorias para as perguntas (português, matemática e etc) [x]
    O jogo deve permitir que usuários administradores cadastrem perguntas e respostas []
    O jogo deve mostrar perguntas em níveis de dificuldade []
    O jogo deve ter 5 níveis de dificuldade com 5 perguntas cada, totalizando 25 perguntas []

Rotas

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
