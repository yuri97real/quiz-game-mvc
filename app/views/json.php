<?php
    if(empty($index)) {
        echo json_encode($data); //MOSTRAR TUDO
    } else {

        if(empty($data[$index-1])) {
            echo json_encode($data[0]); //MOSTRAR PRIMEIRA, CASO ÍNDICE NÃO EXISTA
        } else {
            echo json_encode($data[$index-1]); //MOSTRAR PERGUNTA POR ÍNDICE
            //INDEX - 1, POIS "0" NA URL FICA NULL
        }
    }
?>