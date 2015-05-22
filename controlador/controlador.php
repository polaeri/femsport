
<?php

include 'modelo/Jugador.php';
include 'modelo/Club.php';
include 'modelo/Session.php';
include 'modelo/Conexio.php';
include 'modelo/ConexioCalendario.php';
if (isset($_POST["accion"])) {
    $accio = $_POST["accion"];
    switch ($accio) {
        case "portada":
            include "vistas/selectRol.html";
            break;
        case "nuevoJugador":
            include "vistas/formularioJugador2.php";
            break;
        case "nuevoClub":
            include "vistas/formularioClub2.php";
            break;
            //REGISTRO DE JUGADOR
        case "Registrar":
            
            //COMPROBACION DE DATOS VACIOS 
            if (!isset($_POST['descripcion'])) {$_POST['descripcion'] = NULL;}
            if (!isset($_POST['avatar'])){$_POST['avatar']= "style/avatars/defaultJugador.png";}
            
            $jugador = new Jugador($_POST['nombre'], $_POST['dni'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['usuario'], 0, $_POST['pwd1'], $_POST['descripcion'], $_POST['avatar']);
            $jugador->guardarJugador();
            include 'vistas/registroCompletado.php';
            break;
            //REGISTRO DE CLUB
        case "Registrarse":
            
            //COMPROBACION DE DATOS VACIOS 
            if (!isset($_POST['descripcion'])) {$_POST['descripcion'] = NULL;}
            if (!isset($_POST['descripcion'])) {$_POST['telefono2'] = NULL;}
            if (!isset($_POST['avatar'])){$_POST['avatar']= "style/avatars/defaultJugador.png";}
            
            $j = 0;
            $arrayPistas = [];
            
            //FUTBOL 11
            for ($i = 1; $i <= $_POST['futbol_11']; $i++) {
                $j++;
                $pista = new Pista($_POST["cif"], $j, "futbol_11", $i, "No disponible", "No disponible", true, 33);
                $arrayPistas[$j] = $pista;
            }
            
            //FUTBOL 7
            for ($i = 1; $i <= $_POST['futbol_7']; $i++) {
                $j++;
                $pista = new Pista($_POST["cif"], $j, "futbol_7", $i, "No disponible", "No disponible", true, 21);
                $arrayPistas[$j] = $pista;
            }
            
            //FUTBOL 5
            for ($i = 1; $i <= $_POST['futbol_5']; $i++) {
                $j++;
                $pista = new Pista($_POST["cif"], $j, "futbol_5", $i, "No disponible", "No disponible", true, 15);
                $arrayPistas[$j] = $pista;
            }
            
            //BASKET
            for ($i = 1; $i <= $_POST['basket']; $i++) {
                $j++;
                $pista = new Pista($_POST["cif"], $j, "basket", $i, "No disponible", "No disponible", true, 15);
                $arrayPistas[$j] = $pista;
            }

            $club = new Club($_POST["cif"], $_POST["nombre"], $_POST["telefono"], $_POST["telefono2"], $_POST["direccion"], $_POST["email"], $_POST["avatar"], $_POST["web"], $_POST["password"], $_POST["descripcion"], $arrayPistas);
            $club->guardarClub();
            include 'vistas/registroCompletado.php';

            //Añadir tablas Mysql del calendario
            $ConexioCalendario = new ConexioCalendario();
            $ConexioCalendario->registrarClub($_POST["cif"], $_POST["email"]);

            break;
        case "login":
            $sessio = new Session();
            $conexion = new Conexio();
            $club = $conexion->buscarClub($_POST["usuario"], $_POST["contrasena"]);
            if ($club !== null) {
                $sessio->setSession("club", $conexion->buscarClub($_POST["usuario"], $_POST["contrasena"]));
                $sessio->setSession("CIFclub",$_POST["usuario"]);
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
        
        case "atrasJugador":
             $sessio = new Session();
            include 'vistas/gestionJugador.php';
            break;
        
         case "atrasClub":
             $sessio = new Session();
            include 'vistas/gestionClub.php';
            break;
     
        case "perfilClub":
            include 'vistas/perfilClub.php';
            break;
        case "calendario":
            include 'vistas/calendario.php';
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
            if ($_POST['contrasenaVieja'] === "") {
                $jugador->modificarJugador($_POST['telefono'], $_POST['email'], null, $_POST['descripcion']);
                $jugador->guardarModificarJugador();
                include 'vistas/perfilJugador.php';
            } else if ($jugador->comprovarPassword($_POST['contrasenaVieja'])) {
                $jugador->modificarJugador($_POST['telefono'], $_POST['email'], $_POST['contrasenaNueva'], $_POST['descripcion']);
                $jugador->guardarModificarJugador();
                include 'vistas/perfilJugador.php';
            } else {
                include 'vistas/editarPerfilJugador.php'; //enviar un mensaje de error (la contraseña no es correcta)
            }
            break;
        case "editarPerfilClub":
            include 'vistas/editarPerfilClub.php';
            break;
        case "cancelarEditarPerfilClub":
            include 'vistas/PerfilClub.php';
            break;
        case "guardarEditarPerfilClub":
            $session = new Session();
            $club = $session->getSession("club");
            if ($_POST['contrasenaVieja'] === "") {
                $club->modificarClub($_POST['telefono'], $_POST['telefono2'], $_POST['email'], $_POST['direccion'], $_POST['web'], $_POST['descripcion'], null);
                $club->guardarModificarClub();
                include 'vistas/perfilClub.php';
            } else if ($club->comprovarPassword($_POST['contrasenaVieja'])) {
                $club->modificarClub($_POST['telefono'], $_POST['telefono2'], $_POST['email'], $_POST['direccion'], $_POST['web'], $_POST['descripcion'], $_POST['contrasenaNueva']);
                $club->guardarModificarClub();
                include 'vistas/perfilClub.php';
            } else {
                include 'vistas/editarPerfilClub.php'; //enviar un mensaje de error (la contraseña no es correcta)
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
