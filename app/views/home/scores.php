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


            <a href="" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
    </ul>

<?php } ?>

