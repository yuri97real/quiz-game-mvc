<form method="POST">

    <div class="input-field">
        <input type="text" name="nome" id="nome" class="dados" required>
        <label for="nome">Nome</label>
    </div>

    <div class="input-field">
        <input type="email" name="email" id="email" required>
        <label for="email">Email</label>
    </div>

    <div class="input-field">
        <input type="password" name="senha" id="senha" required>
        <label for="senha">Senha</label>
    </div>

    <button name="cadastrarJogador" id="cadJogador" class="waves-effect waves-light green btn">Criar Jogador</button>
    <a href="/" class="waves-effect waves-light orange btn">Fazer Login</a>

</form>

<script src="/js/patternAll.js"></script>

<?php
    if(!empty($data["mensagem"])) {
        echo $data["mensagem"];
    }
?>

