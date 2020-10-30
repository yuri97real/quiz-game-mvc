<form method="POST">

    <div class="row">
        <div class="input-field">
          <textarea name="dados[]" id="pergunta" class="dados materialize-textarea" required><?php echo $data["question"]["PERGUNTA"]; ?></textarea>
          <label for="pergunta">Pergunta</label>
        </div>
    </div>

    <div class="input-field">
        <input type="text" name="dados[]" id="opcoes" value="<?php echo $data["question"]["OPCOES"] ?>" required>
        <label for="opcoes">Opções</label>
    </div>

    <div class="input-field">
        <input type="text" name="dados[]" id="certa" class="dados" value="<?php echo $data["question"]["CERTA"] ?>" required>
        <label for="certa">Opção Certa</label>
    </div>
    
    <div class="input-field">
        <select name="dados[]" id="niveis" required>
            <?php

                $niveis = ["Muito Fácil", "Fácil", "Médio", "Difícil", "Muito Difícil"];
                $i = 1;

                foreach($niveis as $nivel) {

                    if($data["question"]["NIVEL"] != $i) {
                        echo "<option value='$i'>$nivel</option>";
                    } else {
                        echo "<option value='$i' selected>$nivel</option>";
                    }

                    ++$i;
                }

            ?>
        </select>
    </div>

    <div class="input-field">
        <select name="dados[]" id="categorias" required>

            <?php
                
                $categorias =   [   
                                    "Conhecimentos Gerais", 
                                    "Matemática", 
                                    "História", "Filmes", "Músicas"
                                ];

                foreach($categorias as $categoria) {

                    if($data["question"]["CATEGORIA"] != mb_strtoupper($categoria)) {
                        echo "<option value='$categoria'>$categoria</option>";
                    } else {
                        echo "<option value='$categoria' selected>$categoria</option>";
                    }
                }

            ?>

        </select>
    </div>

    <button name="atualizarQuiz" id="cadQuiz" class="waves-effect waves-light green btn">Atualizar Dados</button>

</form>

<script src="/js/patternAll.js"></script>
<script src="/js/cadQuiz.js"></script>

<?php
    if(!empty($data["message"])) {
        echo $data["message"];
    }
    //print_r($data["question"]);
?>

