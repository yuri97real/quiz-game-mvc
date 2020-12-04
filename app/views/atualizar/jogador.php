<h1>Meus Dados</h1>

<form method="POST">

    <div class="input-field">
        <input type="text" name="nome" id="nome" value="<?php echo $_SESSION["NOME"]; ?>" class="dados" required>
        <label for="nome">Nome</label>
    </div>

    <div class="input-field">
        <input type="email" name="email" id="email" value="<?php echo $_SESSION["EMAIL"]; ?>" required>
        <label for="email">Email</label>
    </div>

    <div class="input-field">
        <input type="password" name="senha" id="senha">
        <label for="senha">Senha</label>
    </div>

    <button name="atualizarJogador" id="atuJogador" class="waves-effect waves-light green btn">Atualizar Jogador</button>

</form>

<script src="/js/patternAll.js"></script>

<?php
    if(!empty($data["mensagem"])) {
        echo $data["mensagem"];
    }
?>

