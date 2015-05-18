
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
            include 'vistas/registroCompletado.php';
            break;
        case "registroClub":
            echo "registroclub";
            echo $_POST["nombre"]. "<br>";
            echo $_POST["cif"]. "<br>";
            echo $_POST["telefono"]. "<br>";
            echo $_POST["telefono2"]. "<br>";
            echo $_POST["direccion"]. "<br>";
            echo $_POST["email"]. "<br>";
            echo $_POST["avatar"]. "<br>";
            echo $_POST["web"]. "<br>";
            echo $_POST["password"]. "<br>";
            echo $_POST["descripcion"]. "<br>";
            break;
        case "login":
            echo "LOGIN ECHO: " . $_POST["usuario"] . "  " . $_POST["contrasena"];
            break;
        default :
            echo 'HOLAMUNDO';
            break;
    }
} else {
    include 'vistas/intro/portada.html';
}
?>
