<?php

class Club {

    private $cif;
    private $nombre;
    private $telefono;
    private $telefono2;
    private $direccion;
    private $email;
    private $avatar;
    private $web;
    private $password;
    private $descripcion;

    function __construct($cif, $nombre, $telefono, $telefono2, $direccion, $email, $avatar, $web, $password, $descripcion) {
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->telefono2 = $telefono2;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->web = $web;
        $this->password = $password;
        $this->descripcion = $descripcion;
    }

    function printClub() {
        echo "CLUB<br>CIF: " . $this->cif . "<br>Nombre:" . $this->nombre . "<br>Telefono: " . $this->telefono .
        "<br>Telefono 2: " . $this->telefono2 . "<br>Direccion: " . $this->direccion . "<br>Email: " .
        $this->email . "<br>Avatar: " . $this->avatar . "<br>Web: " . $this->web . "<br>Password: " .
        $this->password . "<br>Descripcion: " . $this->descripcion . "<br>";
    }

    function guardarClub() {
        $conexio = new Conexio();
        $conexio->guardarClub($this->cif, $this->nombre, $this->telefono, $this->telefono2, $this->direccion, $this->email, $this->avatar, $this->web, $this->password, $this->descripcion);
        $conexio->tancarConexio();
    }
    
    function getCIF(){
        return $this->cif;
    }

}
