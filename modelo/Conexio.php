<?php

class Conexio {

    private $connexio = null;

    function __construct() {
        $this->connexio = new mysqli("endurorocks.com", "femsport", "xpid2015", "femsport");
//$this->connexio = new mysqli("localhost", "polaeri", "123456", "femsport");
    }

    function tancarConexio() {
        $this->connexio->close();
    }

////////////////////////////////
//CONSULTAS DE JUGADOR Y CLUB///
///////////////////////////////

    public function validarJugadorExistente($campo, $validacion) {
        $senetenciaSql = "SELECT * FROM jugador WHERE " . $campo . "='" . $validacion . "'";
        $comprobar = $this->connexio->query($senetenciaSql);
        if ($comprobar->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validarClubExistente($cif) {
        $senetenciaSql = "SELECT * FROM club WHERE cif='" . $cif . "'";
        $comprobar2 = $this->connexio->query($senetenciaSql);
        if ($comprobar2->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function guardarJugador($dni, $nombre, $apellidos, $telefono, $email, $usuario, $reputacion, $contrasena, $descripcion, $avatar) {
        $sentenciaSql = "INSERT INTO jugador(dni, nombre, apellidos, telefono, email, usuario, reputacion, contrasena, descripcion, avatar) VALUES ('"
                . $dni . "','" . $nombre . "','" . $apellidos . "','" . $telefono . "','" . $email . "','" . $usuario . "','" . $reputacion . "','" .
                $contrasena . "','" . $descripcion . "','" . $avatar . "')";
        $this->connexio->query($sentenciaSql);
    }

    public function buscarJugador($usuario, $contrasena) {
        $sentenciaSql = "SELECT * FROM jugador WHERE usuario = '" . $usuario . "' AND contrasena = '" . $contrasena . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $nombre = $vector["nombre"];
            $dni = $vector["dni"];
            $apellidos = $vector["apellidos"];
            $telefono = $vector["telefono"];
            $email = $vector["email"];
            $usuario = $vector["usuario"];
            $reputacion = $vector["reputacion"];
            $contrasena = $vector["contrasena"];
            $descripcion = $vector["descripcion"];
            $avatar = $vector["avatar"];
        }
        if (isset($nombre) && isset($dni) && isset($apellidos) && isset($telefono) && isset($email) && isset($usuario) && isset($reputacion) && isset($contrasena) && isset($avatar) && isset($descripcion)) {
            $jugador = new Jugador($nombre, $dni, $apellidos, $telefono, $email, $usuario, $reputacion, $contrasena, $descripcion, $avatar);
            return $jugador;
        } else {
            return null;
        }
    }

    public function modificarJugador($jugador) {
        $sentenciaSql = "UPDATE jugador SET nombre= '" . $jugador->getNombre() .
                "', apellidos ='" . $jugador->getApellidos() . "', telefono ='" . $jugador->getTelefono() .
                "', email ='" . $jugador->getEmail() . "', usuario ='" . $jugador->getUsuario() .
                "', reputacion ='" . $jugador->getReputacion() . "',contrasena ='" . $jugador->getContrasena() .
                "', descripcion = '" . $jugador->getDescripcion() . "', avatar = '" . $jugador->getAvatar() .
                "' WHERE dni = '" . $jugador->getDni() . "';";
        $this->connexio->query($sentenciaSql);
    }

    public function comprovarPasswordJugador($usuario, $contrasenaVieja, $contrasenaNueva) {
        $sentenciaSql = "SELECT * FROM jugador WHERE usuario = '" . $usuario . "' AND contrasena = '" . $contrasenaVieja . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $usuarioBBDD = $vector["usuario"];
            $contrasenaBBDD = $vector["contrasena"];
        }
        if (isset($usuarioBBDD) && $contrasenaNueva == $contrasenaBBDD) {
            return true;
        } else {
            return false;
        }
    }

//////////////////////  
//CONSULTAS DE CLUB///
//////////////////////
    public function modificarClub($club) {
        $sentenciaSql = "UPDATE club SET nombre='" . $club->getNombre() .
                "',telefono='" . $club->getTelefono() . "',telefono2='" . $club->getTelefono2() . "',direccion='" .
                $club->getDireccion() . "',email='" . $club->getEmail() . "',avatar='" . $club->getAvatar() . "',web='" .
                $club->getWeb() . "',password='" . $club->getPassword() . "',descripcion='" . $club->getDescripcion() .
                "' WHERE cif='" . $club->getCIF() . "'";
        $this->connexio->query($sentenciaSql);
    }

//CLUB
    public function guardarClub($cif, $nombre, $telefono, $telefono2, $direccion, $email, $avatar, $web, $password, $descripcion, $pistas) {
        $sentenciaSql = "INSERT INTO club(cif, nombre, telefono, telefono2, direccion, email, avatar, web, password, descripcion) VALUES ('"
                . $cif . "', '" . $nombre . "', '" . $telefono . "', '" . $telefono2 . "', '" . $direccion . "', '" . $email . "', '" . $avatar . "', '" .
                $web . "', '" . $password . "', '" . $descripcion . "')";
        $this->connexio->query($sentenciaSql);
        foreach ($pistas as $key => $value) {
            $pista = $value;
            $sentenciaSql = "INSERT INTO pista(cif_club, id, tipo, numeroTipo, direccion, descripcion, disponibilidad, maxJugadores) VALUES ('"
                    . $pista->getCifClub() . "', NULL, '" . $pista->getTipo() . "', '" . $pista->getNumeroTipo() .
                    "', '" . $pista->getDireccion() . "', '" . $pista->getDescripcion() . "', '" . $pista->getDisponibilidad() . "', '" .
                    $pista->getMaximoJugadores() . "')";
            $this->connexio->query($sentenciaSql);
        }
    }

    public function buscarClub($cif, $password) {
        $sentenciaSql = "SELECT * FROM club WHERE cif = '" . $cif . "' AND password = '" . $password . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $cif = $vector["cif"];
            $nombre = $vector["nombre"];
            $telefono = $vector["telefono"];
            $telefono2 = $vector["telefono2"];
            $direccion = $vector["direccion"];
            $email = $vector["email"];
            $avatar = $vector["avatar"];
            $web = $vector["web"];
            $password = $vector["password"];
            $descripcion = $vector["descripcion"];
        }

//BUSQUEM LES PISTES DEL CLUB
        $sentenciaSql2 = "SELECT * FROM pista WHERE cif_club = '" . $cif . "'";
        $consulta2 = $this->connexio->query($sentenciaSql2);
        $pistas = [];
        $j = 0;
        while ($vector = $consulta2->fetch_array(MYSQLI_ASSOC)) {
            $pista = new Pista($vector['cif_club'], $vector['id'], $vector['tipo'], $vector['numeroTipo'], $vector['direccion'], $vector['descripcion'], $vector['disponibilidad'], $vector['maxJugadores']);
            $pistas[$j] = $pista;
            $j++;
        }
        if (isset($cif) && isset($nombre) && isset($telefono) && isset($telefono2) && isset($direccion) && isset($email) && isset($avatar) && isset($web) && isset($password) && isset($descripcion)) {
            $club = new Club($cif, $nombre, $telefono, $telefono2, $direccion, $email, $avatar, $web, $password, $descripcion, $pistas);
            return $club;
        } else {
            return null;
        }
    }

    function buscarNomClub($cif) {
        $sentenciaSql = "SELECT nombre FROM club WHERE cif = '" . $cif . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $nombre = $vector['nombre'];
        }
        return $nombre;
    }

    function mostrarClubs($deporte) {
        $sentenciaSql = "SELECT * FROM club WHERE cif IN ( SELECT cif_club FROM pista WHERE tipo = '" . $deporte . "')";
        $consulta = $this->connexio->query($sentenciaSql);
        $clubs = [];
        $i = 0;
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $cif = $vector["cif"];
            $nombre = $vector["nombre"];
            $telefono = $vector["telefono"];
            $telefono2 = $vector["telefono2"];
            $direccion = $vector["direccion"];
            $email = $vector["email"];
            $avatar = $vector["avatar"];
            $web = $vector["web"];
            $password = $vector["password"];
            $descripcion = $vector["descripcion"];
            $club = new Club($cif, $nombre, $telefono, $telefono2, $direccion, $email, $avatar, $web, $password, $descripcion, $pistas);
            $clubs[$i] = $club;
            $i++;
        }
        return $clubs;
    }

    function existeFutbol($cif) {
        $sentenciaSql2 = "SELECT * FROM pista WHERE cif_club = '" . $cif . "' AND tipo = 'futbol_11' OR tipo = 'futbol_7' OR tipo = 'futbol_5'";
        $consulta2 = $this->connexio->query($sentenciaSql2);
        $auxiliar = false;
        while ($vector = $consulta2->fetch_array(MYSQLI_ASSOC)) {
            if ($vector['cif_club'] === $cif) {
                $auxiliar = true;
            }
        }
        return $auxiliar;
    }

    function existeBasket($cif) {
        $sentenciaSql2 = "SELECT * FROM pista WHERE cif_club = '" . $cif . "' AND tipo = 'basket'";
        $consulta2 = $this->connexio->query($sentenciaSql2);
        $auxiliar = false;
        while ($vector = $consulta2->fetch_array(MYSQLI_ASSOC)) {
            if ($vector['cif_club'] === $cif) {
                $auxiliar = true;
            }
        }
        return $auxiliar;
    }

    function existePadel($cif) {
        $sentenciaSql2 = "SELECT * FROM pista WHERE cif_club = '" . $cif . "' AND tipo = 'padel'";
        $consulta2 = $this->connexio->query($sentenciaSql2);
        $auxiliar = false;
        while ($vector = $consulta2->fetch_array(MYSQLI_ASSOC)) {
            if ($vector['cif_club'] === $cif) {
                $auxiliar = true;
            }
        }
        return $auxiliar;
    }

    function guardarReserva($totalJugadores, $fechaPartido, $fechaReserva, $estado, $privacidad, $maxJugadores, $dni, $idPista) {

        $sentenciaSql = "INSERT INTO datos_reserva (id , total_jugadores , fecha_partido , fecha_reserva , estado , privacidad , maximo_jugadores , dni_jugador_responsable , id_pista )VALUES ( NULL ,  '" . $totalJugadores . "',  '" . $fechaPartido . "',  '" . $fechaReserva . "',  '" . $estado . "',  '" . $privacidad . "',  '" . $maxJugadores . "',  '" . $dni . "',  '" . $idPista . "'
)";
        $this->connexio->query($sentenciaSql);
        echo $this->connexio->error;
    }

    function mostrarPartidos($deporte) {

        $sentenciaSql = "SELECT id, cif_club FROM pista WHERE tipo = '" . $deporte . "'";
        $consulta1 = $this->connexio->query($sentenciaSql);
        $i = 0;
        $reservas = [];
        $data_actual = date("Y-m-d H:i:s");
        while ($vector = $consulta1->fetch_array(MYSQLI_ASSOC)) {
            $sentenciaSql2 = "SELECT * FROM datos_reserva WHERE total_jugadores < maximo_jugadores AND privacidad = '1' AND id_pista = '" . $vector['id'] . "' AND fecha_partido > '" . $data_actual . "'";
            $consulta2 = $this->connexio->query($sentenciaSql2);
            while ($vectorReserva = $consulta2->fetch_array(MYSQLI_ASSOC)) {
                if (isset($vectorReserva['id'])) {
                    $reserva = new Reserva($vectorReserva['id'], $vectorReserva['total_jugadores'], $vectorReserva['fecha_partido'], $vectorReserva['fecha_reserva'], $vectorReserva['estado'], $vectorReserva['privacidad'], $vectorReserva['maximo_jugadores'], $vectorReserva['dni_jugador_responsable'], $vectorReserva['id_pista'], $vector['cif_club']);
                    $reservas[$i] = $reserva;
                    $i++;
                }
            }
        }
        if ($reservas) {
            return $reservas;
        } else {
            return null;
        }
    }

    function buscarPista($cifClub, $pista, $numeroTipo) {
        $sentenciaSql = "SELECT id FROM pista WHERE cif_club = '" . $cifClub . "' AND tipo = '" . $pista . "' AND numeroTipo = '" . $numeroTipo . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $id = $vector["id"];
        }
        return $id;
    }

    function buscarTipoPista($id) {
        $sentenciaSql = "SELECT tipo FROM pista WHERE id = '" . $id . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $tipo = $vector["tipo"];
        }
        if (isset($tipo)) {
            return $tipo;
        }else{
            return "NOO";
        }
    }

    function buscarReserva($id) {
        $sentenciaSql = "SELECT * FROM datos_reserva WHERE id = '" . $id . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $totalJugadores = $vector['total_jugadores'];
            $fecha_partido = $vector['fecha_partido'];
            $fecha_reserva = $vector['fecha_reserva'];
            $estado = $vector['estado'];
            $privacidad = $vector['privacidad'];
            $maximo_jugadores = $vector['maximo_jugadores'];
            $dni_jugador_responsable = $vector['dni_jugador_responsable'];
            $id_pista = $vector['id_pista'];
        }
        $reserva = new Reserva($id, $totalJugadores, $fecha_partido, $fecha_reserva, $estado, $privacidad, $maximo_jugadores, $dni_jugador_responsable, $id_pista, null);
        return $reserva;
    }

    function buscarIdAnadirJugador($dni, $id) {
        $sentenciaSql = "SELECT * FROM jugadores_anadidos WHERE dni_jugador = '" . $dni . "' AND id_reserva = '" . $id . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $dni_aux = $vector['dni_jugador'];
        }
        if (isset($dni_aux)) {
            return true;
        } else {
            return false;
        }
    }

    function actualizarReserva($reserva) {
        $sesion = new Session();
        $jugador = $sesion->getSession('jugador');
        $dni_jugador = $jugador->getDni();
        $id_reserva = $reserva->getId();
        $dni = $jugador->getDni();
        $dni_responsable_reserva = $reserva->getDni_jugador_responsable();
        $resultat1 = $this->buscarIdAnadirJugador($dni, $id_reserva);

        if ($dni_jugador === $dni_responsable_reserva) {
            $resultat2 = true;
        } else {
            $resultat2 = false;
        }
        if ($resultat1 || $resultat2) {
            return false;
        } else {
            $sentenciaSql = "UPDATE datos_reserva SET total_jugadores= '" . $reserva->getTotalJugadores() . "' WHERE id='" . $reserva->getId() . "'";
            $this->connexio->query($sentenciaSql);

            $sentenciaSql2 = "INSERT INTO jugadores_anadidos(dni_jugador, id_reserva) VALUES ('" . $dni_jugador . "','" . $id_reserva . "')";
            $this->connexio->query($sentenciaSql2);
            return true;
        }
    }

    function busarHistorialReservas($dni_jugador) {
        $sentenciaSql = "SELECT * FROM datos_reserva WHERE dni_jugador_responsable = '" . $dni_jugador . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        $i = 0;
        $arrayHistorial = [];
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $id = $vector['id'];
            $totalJugadores = $vector['total_jugadores'];
            $fecha_partido = $vector['fecha_partido'];
            $fecha_reserva = $vector['fecha_reserva'];
            $estado = $vector['estado'];
            $privacidad = $vector['privacidad'];
            $maximo_jugadores = $vector['maximo_jugadores'];
            $dni_jugador_responsable = $vector['dni_jugador_responsable'];
            $id_pista = $vector['id_pista'];
            $cif_club = $this->buscarCifClub($id_pista);
            $reserva = new Reserva($id, $totalJugadores, $fecha_partido, $fecha_reserva, $estado, $privacidad, $maximo_jugadores, $dni_jugador_responsable, $id_pista, $cif_club);
            $arrayHistorial[$i] = $reserva;
            $i++;
        }
        return $arrayHistorial;
    }

    function buscarCifClub($id_pista) {
        $sentenciaSql = "SELECT cif_club FROM pista WHERE id = '" . $id_pista . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $cif = $vector['cif_club'];
        }
        return $cif;
    }

    function busarPartidosInvitados($dni_jugador) {
        $sentenciaSql = "SELECT id_reserva FROM jugadores_anadidos WHERE dni_jugador = '" . $dni_jugador . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        $i = 0;
        $arrayHistorial = [];
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $id_reserva = $vector['id_reserva'];
            $arrayHistorial[$i] = $id_reserva;
            $i++;
        }
        return $arrayHistorial;
    }

    function buscarPartidosReservadoConId($id) {
        $data_actual = date("Y-m-d H:i:s");
        $sentenciaSql = "SELECT * FROM datos_reserva WHERE id = '" . $id . "' AND fecha_partido > '" . $data_actual . "'";
        $consulta = $this->connexio->query($sentenciaSql);
        $i = 0;
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $id = $vector['id'];
            $totalJugadores = $vector['total_jugadores'];
            $fecha_partido = $vector['fecha_partido'];
            $fecha_reserva = $vector['fecha_reserva'];
            $estado = $vector['estado'];
            $privacidad = $vector['privacidad'];
            $maximo_jugadores = $vector['maximo_jugadores'];
            $dni_jugador_responsable = $vector['dni_jugador_responsable'];
            $id_pista = $vector['id_pista'];

            $reserva = new Reserva($id, $totalJugadores, $fecha_partido, $fecha_reserva, $estado, $privacidad, $maximo_jugadores, $dni_jugador_responsable, $id_pista, null);
            $i++;
        }
        return $reserva;
    }

}
