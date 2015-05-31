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

    public function validarJugadorExistente($usuario, $dni) {
        $senetenciaSql = "SELECT * FROM jugador WHERE usuario='" . $usuario . "' OR dni = '" . $dni . "'";
        $comprobar = $this->connexio->query($senetenciaSql);
        if ($comprobar->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarClubExistente($cif) {
        $senetenciaSql = "SELECT * FROM club WHERE cif='" . $cif ."'";
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

}
