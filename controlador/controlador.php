
<?php

if (isset($_POST["accion"])) {
    $accio = $_POST["accion"];
    //$sessio = new Session();
    switch ($accio) {
        case "portada":
            include "vistas/selectRol.html";
            break;
        case "nuevoJugador":
            include "vistas/formularioJugador.php"; 
            break;
        case "nuevoClub":
            include "vistas/formularioClub.php"; 
            break;
        default :
            echo 'HOLAMUNDO';
            break;
    }
} else {
    include 'vistas/intro/portada.html';
}
?>
