<?php

function conexionBBDD () {
    $mysqli = new mysqli('localhost','warex','warex','warex');

    if($mysqli->connect_errno) {
        echo "Fallo la conexión ". $mysqli->connect_error;
        die();
    } else {
        return $mysqli;
    }
}


?>