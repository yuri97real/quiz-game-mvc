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


            <a href="/home/scores/zerar" class="secondary-content">
                <?php if($player["NOME"] == $_SESSION["NOME"]) echo '<i class="material-icons">clear</i>'; ?>
            </a>
        </li>
    </ul>

<?php } ?>

<?php if($data["action"] == "zerar") { ?>

    <div class="row">
        <div class="offset-s4 card">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Zerar Score</span>
                    <p>Clicando em "Sim", todo seu score será zerado
                    e você irá para as últimas posições desta lista!
                    Deseja realmente isso?</p>
                </div>

                <div class="card-action">
                    <a href="#">Sim</a>
                    <a href="/home/scores" class="btn">Não</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
