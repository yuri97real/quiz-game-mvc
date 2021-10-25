<!-- BARRA DE PESQUISA -->
<nav>
    <div class="nav-wrapper">

        <form>
            <div class="input-field">
                <input type="search" id="search" class="search" value="<?= $_GET["keyword"] ?? "" ?>" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons close">close</i>
            </div>
        </form>

    </div>
</nav>

<div class="center">
    <?php $current = $data["page"]; ?>

    <ul class="pagination">
        <li class="<?= $current == 1 ? "disabled" : "" ?>">
            <a href="/cadastro/atualizarQuiz/1"><i class="material-icons">chevron_left</i></a>
        </li>

        <?php
            $next = $current + 1;
            $previous = $current - 1;

            $start = $current - 2;
            $limit = $current + 4;

            $pages = range($start, $limit);
            $pages = array_filter($pages, function($page) { return $page > 0; });
            $pages = array_values($pages);

            for($i=$pages[0]; $i<$limit; $i++) {
                $class = $i == $current ? " class='active'" : "";
                echo "<li{$class}><a onclick='fixRoute(this)' href='/cadastro/atualizarQuiz/{$i}'>{$i}</a></li>";
            }
        ?>

        <li>
            <a href="/cadastro/atualizarQuiz/<?= $limit ?>"><i class="material-icons">chevron_right</i></a>
        </li>
    </ul><!--pagination-->
</div><!--center-->

<?php
    if(!empty($data["questions"])) {

        echo   "<h3>Escolha uma Questão Abaixo</h3>
                <p>Clicando sobre um dos enunciados, será possível editá-los.</p>
                <a href='' class='hide waves-effect waves-light red btn'>Deletar Tudo</a>";

        echo "<div class='results'>";

        foreach($data["questions"] as $question):
?>

    <ul class="collection default">
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
        <button class="modal-close waves-effect waves-green btn-flat">Não</button>
    </div>
</div>

<?php endforeach ?>

</div><!--results-->

<ul class="collection search-results">

</ul>

<script src="/js/searchPreview2.js"></script>

<?php

    } else {
        echo "<h1 class=''>Nenhum Dado Cadastrado!</h1>";
        echo "<p>Adicione Perguntas a Esse Quiz.</p>";
        echo "<a href='/cadastro/novoQuiz' class='waves-effect waves-light orange btn'>Novo Quiz</a>";
    }

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>
