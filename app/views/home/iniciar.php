<form action="" method="POST">
    <?php

        $question = $data["question"]["PERGUNTA"];
        $options = $data["question"]["OPCOES"];
        $options = explode(",", $options);
        $correct = $data["question"]["CERTA"];

        echo "<h1>$question</h1>";

        foreach($options as $option) {
            echo "<button name='resposta' value='$option' class='waves-effect waves-light btn'>$option</button> ";
        }

        if(!empty($data["mensagem"])) {
            echo $data["mensagem"];
        }

    ?>

    <input type="hidden" name="certa" value="<?php echo password_hash($correct, PASSWORD_DEFAULT); ?>">
</form>


