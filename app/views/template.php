<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOGO QUIZ</title>
    <link rel="stylesheet" href="/css/custom.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS/JS-->
    <link rel="stylesheet" href="/materialize/css/materialize.min.css">
    <script type="text/javascript" src="/materialize/js/materialize.min.js"></script>
</head>
<body>

    <?php if(isset($_SESSION["LOGADO"])) { ?>
    
    <div class="">
    <nav>
        <div class="nav-wrapper">
            <a href="/home" class="brand-logo">Quiz</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/cadastro/atualizarJogador">Usuário</a></li>
                <li><a href="/home/scores">Scores</a></li>
                <li class="orange"><a href="/cadastro">Configurações</a></li>
                <li class="teal"><a href="/">Sair</a></li>
            </ul>
        </div>
    </nav>
    </div>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">

                <div class="background">
                    <img src="/images/background-menu-mobile.svg" style="width: 320px;">
                </div>

                <img class="circle profile" src="/images/profile.svg">

                <div class="user-data">
                    <span class="white-text name"><?= $_SESSION["NOME"] ?></span>
                    <span class="white-text email"><?= $_SESSION["EMAIL"] ?></span>
                </div>

            </div>
        </li>

        <li><div class="divider"></div></li>
        <li><a class="subheader">Meus Dados</a></li>
        <li><a href="/cadastro/atualizarJogador">Atualizar Cadastro</a></li>
        <li><a href="/home/scores">Ver Scores</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Opções</a></li>
        <li class=""><a href="/cadastro">Configurações</a></li>
        <li class=""><a href="/">Sair</a></li>
    </ul>

    <?php } ?>

    <div class="row container">

        <?php require_once "../app/views/$view.php"; ?>
        
    </div><!--row container-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>

</body>
</html>