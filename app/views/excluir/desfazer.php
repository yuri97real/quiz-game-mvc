<?php

    if(!empty($data["sucess"])) {
        echo "<h1>RESTAURADO COM SUCESSO!</h1>";
        echo "<p>Você acaba de restaurar um quiz excluído!</p>";
    } else {
        echo "<h1>HOUVE UM ERRO!</h1>";
        echo "<p>Não foi possível restaurar o quiz!</p>";
    }

    echo "<a href='/cadastro/atualizarQuiz' class='waves-effect waves-light green btn'>Voltar</a>";
    echo "<a href='/cadastro/novoQuiz' class='waves-effect waves-light orange btn'>Novo Quiz</a>";

    if(!empty($data["message"])) {
        echo $data["message"];
    }

?>



