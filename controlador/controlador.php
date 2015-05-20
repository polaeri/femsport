
<?php

include 'modelo/Jugador.php';
include 'modelo/Club.php';
include 'modelo/Session.php';
include 'modelo/Conexio.php';
if (isset($_POST["accion"])) {
    $accio = $_POST["accion"];
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
            $jugador = new Jugador($_POST['nombre'], $_POST['dni'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['usuario'], 0, $_POST['pwd1'], $_POST['descripcion'], $_POST['avatar']);
            $jugador->printJugador();
            $jugador->guardarJugador();
            include 'vistas/registroCompletado.php';
            break;
        case "registroClub":
            $club = new Club($_POST["cif"], $_POST["nombre"], $_POST["telefono"], $_POST["telefono2"], $_POST["direccion"], $_POST["email"], $_POST["avatar"], $_POST["web"], $_POST["password"], $_POST["descripcion"]);
            $club->printClub();
            $club->guardarClub();
            break;
        case "login":
            $sessio = new Session();
            $conexion = new Conexio();
            $club = $conexion->buscarClub($_POST["usuario"], $_POST["contrasena"]);
            if ($club !== null) {
                $sessio->setSession("club", $conexion->buscarClub($_POST["usuario"], $_POST["contrasena"]));
                include 'vistas/gestionClub.php';
            } else {
                $jugador = $conexion->buscarJugador($_POST["usuario"], $_POST["contrasena"]);
                if ($jugador !== null) {
                    $sessio->setSession("jugador", $conexion->buscarJugador($_POST["usuario"], $_POST["contrasena"]));
                    include 'vistas/gestionJugador.php';
                } else {
                    //DANI REDIRECCIONA ESTO AL LOGIN CON EL MENSAJE DE USUARIO NO EXISTE
                    echo 'EL USUARIO NO EXISTE';
                }
            }
            break;
        case "perfilJugador":
            include 'vistas/perfilJugador.php';
            break;
        case "reservaJugador":
            include 'vistas/reservaJugador.php';
            break;
        case "buscaJugador":
            include 'vistas/buscarJugador.php';
            break;
        case "salir":
            $sessio = new Session();
            $sessio->destroy();
            include 'vistas/selectRol.html';
            break;
        case "perfilClub":
            include 'vistas/perfilClub.php';
            break;
        case "calendario":
            include 'calendario/index.php';
            break;
        case "editarPerfilJugador":
            include 'vistas/editarPerfilJugador.php';
            break;
        case "cancelarEditarPerfilJugador":
            include 'vistas/perfilJugador.php';
            break;
        case "GuardarEditarPerfilJugador":
            //RECOGER TODOS LOS DATOS DEL NUEVO JUGADOR I HACER UN UPDATE A LA BBDD      
            $session = new Session();
            $jugador = $session->getSession("jugador");
            if ($jugador->comprovarPassword($_POST['contrasenaVieja'])) {
                $jugador->modificarJugador($_POST['telefono'], $_POST['email'], $_POST['contrasenaNueva'], $_POST['descripcion']);
                $jugador->guardarModificarJugador();
                include 'vistas/perfilJugador.php';
            }else{
                include 'vistas/editarPerfilJugador.php'; //enviar un mensaje de error (la contraseña no es correcta)
            }


            break;
        default :
            echo 'HOLAMUNDO';
            break;
    }
} else {
    include 'vistas/intro/portada.html';
}
?>
