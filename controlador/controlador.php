
<?php
include 'modelo/jugador.php';
include 'modelo/Session.php';
include 'modelo/Conexio.php';
if (isset($_POST["accion"])) {
    $accio = $_POST["accion"];
    $sessio = new Session();
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
        case "registroJugador":            
            $jugador = new jugador($_POST['nombre'], $_POST['dni'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['usuario'], 0, $_POST['pwd1'], $_POST['descripcion'], $_POST['avatar']);
            $jugador->printJugador();
            $jugador->guardarJugador();
            include 'vistas/selectRol.html';
            break;
        default :
            echo 'HOLAMUNDO';
            break;
    }
} else {
    include 'vistas/intro/portada.html';
}
?>
