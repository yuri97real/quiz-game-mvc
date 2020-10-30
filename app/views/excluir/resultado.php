<?php

    if($data["sucess"]) {
        echo "<h1>REMOVIDO COM SUCESSO!</h1>";
        echo "<p>Logo abaixo estão os dados do quiz excluído!</p>";
    } else {
        echo "<h1>HOUVE UM ERRO!</h1>";
        echo "<p>Não foi possível remover o quiz abaixo. Tente Novamente!</p>";
    }

    if(!empty($data["question"])) {

        $removed = $data["question"];
        $question = $removed["PERGUNTA"];
        $options = $removed["OPCOES"];
        $options = explode(",", $options);
        $options = implode(" | ", $options);
        $save = array_values($removed);
        $save = implode(" | ", $save);

        echo "<div class='card blue-grey darken-1'>";
        echo "<form action='/cadastro/restaurarQuiz' method='POST' class='card-content white-text'>";
            echo "<span class='card-title'>$question</span>";
            echo "<p>$options</p>";
            echo "<div class='card-action'>";
                echo "<button name='recovery' class='waves-effect waves-light red btn' value='$save'>Desfazer</button>";
            echo "</div><!--card-action-->";
        echo "</form><!--card-content white-text-->";
        echo "</div><!--card blue-grey darken-1-->";

    } else {
        echo "<h3>Nada a Mostrar</h3>";
        echo "<p>Provavelmente esse quiz não existe mais!</p>";
    }

    echo "<a href='/cadastro/atualizarQuiz' class='waves-effect waves-light green btn'>Voltar</a>";
    echo "<a href='/cadastro/novoQuiz' class='waves-effect waves-light orange btn'>Novo Quiz</a>";

    if(!empty($data["message"])) {
        echo $data["message"];
    }
    //print_r(array_values($removed));

?>

