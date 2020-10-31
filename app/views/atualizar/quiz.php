<?php
    if(!empty($data["questions"])) {

        echo   "<h3>Escolha uma Questão Abaixo</h3>
                <p>Clicando sobre um dos enunciados, será possível editá-los.</p>
                <a href='' class='waves-effect waves-light red btn'>Deletar Tudo</a>";

        foreach($data["questions"] as $question) {
?>

    <ul class="collection">
        <li class="collection-item avatar">

            <i class="material-icons circle green">insert_chart</i>
            
        <?php
            echo "<span class='title'><strong><a href='/cadastro/editarQuestao/$question[ID]'>$question[PERGUNTA]</a></strong></span>";
            echo "<p>$question[OPCOES]</p>";
        ?>

            <a class="secondary-content modal-trigger" href="#deletar/<?php echo $question["ID"]; ?>">
                <i class="material-icons">clear</i>
            </a>

        </li>
    </ul>




<div id="deletar/<?php echo $question["ID"]; ?>" class="modal">
    <div class="modal-content">
        <h4>Deletar Questão</h4>
        <p> Clicando em "Sim", todos os dados 
            da questão serão excluídos.
            Deseja realmente isso?
        </p>
    </div>

    <div class="modal-footer">
        <a href="/cadastro/excluirQuiz/<?php echo $question["ID"]; ?>" class="modal-close waves-effect waves-green btn-flat">Sim</a>
        <a href="" class="modal-close waves-effect waves-green btn-flat">Não</a>
    </div>
</div>

<?php }
} else {
    echo "<h1 class=''>Nenhum Dado Cadastrado!</h1>";
    echo "<p>Adicione Perguntas a Esse Quiz.</p>";
    echo "<a href='/cadastro/novoQuiz' class='waves-effect waves-light orange btn'>Novo Quiz</a>";
}?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>
