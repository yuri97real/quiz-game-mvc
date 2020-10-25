<form method="POST">

    <div class="row">
        <div class="input-field">
          <textarea name="dados[]" id="pergunta" class="dados materialize-textarea" required></textarea>
          <label for="pergunta">Pergunta</label>
        </div>
    </div>

    <div class="input-field">
        <input type="text" name="dados[]" id="opcoes" required>
        <label for="opcoes">Opções</label>
    </div>

    <div class="input-field">
        <input type="text" name="dados[]" id="certa" class="dados" required>
        <label for="certa">Opção Certa</label>
    </div>
    
    <div class="input-field">
        <select name="dados[]" id="niveis" required>
            <option value="" disable selected>Nível de Dificuldade</option>
            <option value="1">Muito Fácil</option>
            <option value="2">Fácil</option>
            <option value="3">Médio</option>
            <option value="4">Difícil</option>
            <option value="5">Muito Difícil</option>
        </select>
    </div>

    <div class="input-field">
        <select name="dados[]" id="categorias" required>
            <option value="" disable selected>Categoria da Questão</option>
            <option value="Conhecimentos Gerais">Conhecimentos Gerais</option>
            <option value="Matemática">Matemática</option>
            <option value="História">História</option>
            <option value="Filmes">Filmes</option>
            <option value="Músicas">Músicas</option>
        </select>
    </div>

    <button name="cadastrarQuiz" id="cadQuiz" class="waves-effect waves-light green btn">Salvar Dados</button>

</form>

<script src="/js/patternAll.js"></script>
<script src="/js/cadQuiz.js"></script>

<?php
    if(!empty($data["mensagem"])) {
        echo $data["mensagem"];
    }
?>

