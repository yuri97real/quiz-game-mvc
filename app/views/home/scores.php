<?php
    foreach($data["players"] as $player) {
?>

    <ul class="collection">
        <li class="collection-item avatar">
            <i class="material-icons circle green">insert_chart</i>
            
        <?php
            echo "<span class='title'>$player[NOME]</span>";
            echo "<p>$player[EMAIL]</p>";
            echo "<p>Score: $player[SCORE]</p>";
        ?>


            <a class="secondary-content modal-trigger" href="#zerar">
                <?php if($player["NOME"] == $_SESSION["NOME"]) echo '<i class="material-icons">clear</i>'; ?>
            </a>
        </li>
    </ul>

<?php } ?>


<div id="zerar" class="modal">
    <div class="modal-content">
        <h4>Zerar Score</h4>
        <p> Clicando em "Sim", todo seu score será zerado
            e você irá para as últimas posições desta lista!
            Deseja realmente isso?
        </p>
    </div>

    <div class="modal-footer">
        <a href="/home/scores/zerar" class="modal-close waves-effect waves-green btn-flat">Sim</a>
        <a href="/home/scores" class="modal-close waves-effect waves-green btn-flat">Não</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>
