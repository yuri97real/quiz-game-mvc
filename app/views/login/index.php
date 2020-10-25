<form action="" method="post">

    <div class="input-field">
        <input type="email" name="email" autocomplete="off" required>
        <label for="email">Email</label>
    </div>

    <div class="input-field">
        <input type="password" name="senha" required>
        <label for="senha">Senha</label>
    </div>

    <button name="fazerLogin" class="waves-effect waves-light btn">Entrar</button>
    <a href="/cadastro/novoJogador" class="waves-effect waves-light orange btn">Cadastre-se</a>
    
</form>

<?php
    if(!empty($data["mensagem"])) {
        echo "\n\t$data[mensagem]\t\n";
    }
?>


