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

    function modificarClub($telefono, $telefono2, $email, $direccion, $web, $descripcion, $contrasena) {
        $this->setTelefono($telefono);
        $this->setTelefono2($telefono2);
        $this->setEmail($email);
        $this->setDireccion($direccion);
        $this->setWeb($web);
        $this->setDescripcion($descripcion);
        if (isset($contrasena)) {
            $this->setPassword($contrasena);
        }
        //$this->avatar($avatar);
    }

    function guardarModificarClub() {
        $conexio = new Conexio();
        $conexio->modificarClub($this);
        $conexio->tancarConexio();
    }
    
    function comprovarPassword($contrasena) {
        if ($contrasena === $this->password) {
            return true;
        } else {
            return false;
        }
    }

    function printEditarClub() {
        echo "<li>Telefono: <input type='text' name='telefono' value='" . $this->telefono . "' ></li>";
        echo "<li>Telefono2: <input type='text' name='telefono2' value='" . $this->telefono . "' ></li>";
        echo "<li>Email: <input type='text' name='email' value='" . $this->email . "' ></li>";
        echo "<li>Direccion: <input type='text' name='direccion' value='" . $this->direccion . "' ></li>";
        echo "<li>Web: <input type='text' name='web' value='" . $this->web . "' ></li>";
        echo "<li>Descripcion: <textarea cols='40' rows='6' name='descripcion' >$this->descripcion</textarea></li>";
    }

    function getCIF() {
        return $this->cif;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getWeb() {
        return $this->web;
    }

    function getPassword() {
        return $this->password;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setCIF($cif) {
        $this->cif = $cif;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setWeb($web) {
        $this->web = $web;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDescripcion($description) {
        $this->descripcion = $description;
    }

}
