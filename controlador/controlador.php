
<?php

if (isset($_POST["accion"])) {
    $accio = $_POST["accion"];
    $sessio = new Session();
    switch ($accio) {
        default :
            echo 'HOLAMUNDO';
            break;
    }
} else {
    include 'vistas/intro/index.html';
}
?>
