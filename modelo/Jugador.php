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
        $this->descripcion . "<br> Avatar:<img src= '" . $this->avatar."'>";
    }

    function guardarJugador() {
        $conexio = new Conexio();
        $conexio->guardarJugador($this->dni, $this->nombre, $this->apellidos, $this->telefono, $this->email, $this->usuario, $this->reputacion, $this->contrasena, $this->descripcion, $this->avatar);
        $conexio->tancarConexio();
    }

    function guardarModificarJugador() {
        $conexio = new Conexio();
        $conexio->modificarJugador($this);
        $conexio->tancarConexio();
    }

    function printEditarJugador() {
        
      /*  
        $printJugador ='<input type="tel" name="telefono" placeholder="Telefono" value="' . $this->telefono . '" pattern="^[9|8|7|6|5]\d{8}$" required />'.
                "<li>Email: <input type='text' name='email' value='" . $this->email . "' ></li>".
                "<li>Descripcion: <textarea cols='40' rows='6' name='descripcion' >$this->descripcion</textarea></li>";
        
        return $printJugador;*/
        
        
            
           
       
        //echo "<li>avatar: <input type='file' name='avatar'>" . $this->avatar . "</li>";
        //echo "<li>Nombre: <input type='text' name='nombre' value='" . $this->nombre . "' ></li>";
        //echo "<li>DNI: <input type='text' name='dni' value='" . $this->dni . "' ></li>";
        //echo "<li>Apellidos: <input type='text' name='apellidos' value='" . $this->apellidos . "' ></li>";
       echo '<input type="tel" name="telefono" placeholder="Telefono" value="' . $this->telefono . '" pattern="^[9|8|7|6|5]\d{8}$" required />';
        echo "<li>Telefono: <input type='text' name='telefono' value='" . $this->telefono . "' ></li>";
        echo "<li>Email: <input type='text' name='email' value='" . $this->email . "' ></li>";
        //echo "<li>Usuario: <input type='text' name='usuario' value='" . $this->usuario . "' ></li>";
        //echo "<li>Reputacion: <input type='text' name='reputacion' value='" . $this->reputacion . "' ></li>";
        echo "<li>Descripcion: <textarea cols='40' rows='6' name='descripcion' >$this->descripcion</textarea></li>";
    }

    function printPerfilJugador() {
        echo "<br> Avatar: " . $this->avatar . "<br> Nombre: " . $this->nombre . "<br>DNI: " . $this->dni .
        "<br>Apellidos:" . $this->apellidos . "<br>Telefono: " . $this->telefono . "<br>Email: " .
        $this->email . "<br>Usuario: " . $this->usuario . "<br>Reputacion: " . $this->reputacion .
        "<br>Descripcion: " . $this->descripcion;
    }

    function modificarJugador($telefono, $email, $contrasena, $descripcion) {
        $this->setTelefono($telefono);
        $this->setEmail($email);
        if (isset($contrasena)) {
            $this->setContrasena($contrasena);
        }
        $this->setDescripcion($descripcion);
        //$this->avatar($avatar);
    }

    function comprovarPassword($contrasena) {
        if ($contrasena === $this->contrasena) {
            return true;
        } else {
            return false;
        }
    }

    function setNombre($valor) {
        $this->nombre = $valor;
    }

    function setdni($valor) {
        $this->dni = $valor;
    }

    function setApellidos($valor) {
        $this->apellidos = $valor;
    }

    function setTelefono($valor) {
        $this->telefono = $valor;
    }

    function setEmail($valor) {
        $this->email = $valor;
    }

    function setUsuario($valor) {
        $this->usuario = $valor;
    }

    function setReputacion($valor) {
        $this->reputacion = $valor;
    }

    function setContrasena($valor) {
        $this->contrasena = $valor;
    }

    function setDescripcion($valor) {
        $this->descripcion = $valor;
    }

    function setAvatar($valor) {
        $this->avatar = $valor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDni() {
        return $this->dni;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getReputacion() {
        return $this->reputacion;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAvatar() {
        return $this->avatar;
    }

}
