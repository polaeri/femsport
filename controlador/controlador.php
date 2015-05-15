
<?php

if (isset($_POST["accion"])) {
    $accio = $_POST["accion"];
    //$sessio = new Session();
    switch ($accio) {
        case 'portada':
            include 'vistas/selectRol.html';
            break;            
        default :
            echo 'NO HA RECIBIDO NADA POR POST';
            break;
    }
} else {
    include 'vistas/intro/portada.html';
}
?>
