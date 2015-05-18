<?php

class Conexio {

    private $connexio = null;

    function __construct() {
        $this->connexio = new mysqli("localhost", "polaeri", "123456", "femsport");
    }

    function tancarConexio() {
        $this->connexio->close();
    }

    public function guardarJugador($dni, $nombre, $apellidos, $telefono, $email, $usuario, $reputacion, $contrasena, $descripcion, $avatar) {
        $sentenciaSql = "INSERT INTO jugador(dni, nombre, apellidos, telefono, email, usuario, reputacion, contrasena, descripcion, avatar) VALUES ('"
                . $dni . "','" . $nombre . "','" . $apellidos . "','" . $telefono . "','" . $email . "','" . $usuario . "','" . $reputacion . "','" .
                $contrasena . "','" . $descripcion . "','" . $avatar . "')";
        $consulta = $this->connexio->query($sentenciaSql);
        if ($consulta == TRUE) {
            return true;
        } else {
            return false;
        }
    }
    
    public function recuperarJugador($usuario){
        $sentenciaSql = "SELECT * FROM jugador WHERE usuario = '". $usuario ."'";
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
        $jugador = new jugador($nombre, $dni, $apellidos, $telefono, $email, $usuario, $reputacion, $contrasena, $descripcion, $avatar);
        return $jugador;
    }

}
