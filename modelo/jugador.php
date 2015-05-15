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
    
    

}
