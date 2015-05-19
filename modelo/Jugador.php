<?php
class jugador {
    
    private $nombre;
    private $dni;
    private $apellidos;
    private $telefono;
    private $email;
    private $usuario;
    private $reputacion;
    private $contrasena;
    private $descripcion;
    private $avatar;

    function __construct($nombre, $dni, $apellidos, $telefono, $email, $usuario, $reputacion, $contrasena, $descripcion, $avatar) {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->usuario = $usuario;
        $this->reputacion = $reputacion;
        $this->contrasena = $contrasena;
        $this->descripcion = $descripcion;
        $this->avatar = $avatar;
    }
    
    function printJugador() {
        echo "Nombre: " . $this->nombre . "<br>DNI: " . $this->dni . "<br>Apellidos:" . $this->apellidos . 
                "<br>Telefono: " . $this->telefono . "<br>Email: " . $this->email . "<br>Usuario: " . $this->usuario . 
                "<br>Reputacion: " . $this->reputacion . "<br>Contraseña: " . $this->contrasena . "<br>Descripcion: " . 
                $this->descripcion . "<br> Avatar: " . $this->avatar;
    }
    
    function guardarJugador(){
        $conexio = new Conexio();
        $conexio->guardarJugador($this->dni, $this->nombre, $this->apellidos, $this->telefono, $this->email, $this->usuario, $this->reputacion, $this->contrasena, $this->descripcion, $this->avatar);
        $conexio->tancarConexio();
    }
    
    function getUsuario(){
        return $this->usuario;
    }
    

}
