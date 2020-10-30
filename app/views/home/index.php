<?php
    $lower = strtolower($_SESSION["NOME"]);
    $name_show = ucwords($lower);
?>
<h1>Bem-Vindo <strong><?php echo $name_show; ?></strong>!</h1>

<a href="/home/iniciar" class="waves-effect waves-light green btn">Iniciar Jogo</a>
<a href="/cadastro" class="waves-effect waves-light orange btn">Configurações</a>

<?php
    if(!empty($data["mensagem"])) {
        echo $data["mensagem"];
    }
?>
