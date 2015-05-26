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
    private $pistas;

    function __construct($cif, $nombre, $telefono, $telefono2, $direccion, $email, $avatar, $web, $password, $descripcion, $pistas) {
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
        $this->pistas = $pistas;
    }

    function printClub() {
        echo "CLUB<br>CIF: " . $this->cif . "<br>Nombre:" . $this->nombre . "<br>Telefono: " . $this->telefono .
        "<br>Telefono 2: " . $this->telefono2 . "<br>Direccion: " . $this->direccion . "<br>Email: " .
        $this->email . "<br>Avatar: " . $this->avatar . "<br>Web: " . $this->web . "<br>Password: " .
        $this->password . "<br>Descripcion: " . $this->descripcion . "<br>";
    }

    function guardarClub() {
        $conexio = new Conexio();
        $conexio->guardarClub($this->cif, $this->nombre, $this->telefono, $this->telefono2, $this->direccion, $this->email, $this->avatar, $this->web, $this->password, $this->descripcion, $this->pistas);
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
        echo "<input type='tel' name='telefono' pattern='^[9|8|7|6|5]\d{8}$' placeholder='Teléfono'required value='" . $this->telefono . "' >";
        echo "<input type='tel' name='telefono2' pattern='^[9|8|7|6|5]\d{8}$' placeholder='Teléfono2'value='" . $this->telefono2 . "' >";
        echo "<input type='email' name='email'pattern='^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$' required value='" . $this->email . "' >";
        echo "<input type='text' name='direccion' placeholder='Dirección' pattern='[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}' required value='" . $this->direccion . "' >";
        echo "<input type='url' name='web' placeholder='Página Web'pattern='^http://www.[a-zA-Z0.9._-]{4,}$' required value='" . $this->web . "' ></li>";
        echo "<textarea name='descripcion'  cols='40' rows='6' placeholder='Descripción'>$this->descripcion</textarea>";
    }

    function existeFutbol() {
        $conexio = new Conexio();

        if ($conexio->existeFutbol($this->cif)) {
            return "<p> <button name='accion' value='verPistasFutbol' class='boton2 purpura formaBoton'>Futbol</button></p>";
        }

        $conexio->tancarConexio();
    }

    function existeBasket() {
        $conexio = new Conexio();

        if ($conexio->existeBasket($this->cif)) {
            return "<p> <button name='accion' value='verPistasBasket' class='boton2 purpura formaBoton'>Basket</button></p>";
        }

        $conexio->tancarConexio();
    }

    function existePadel() {
        $conexio = new Conexio();

        if ($conexio->existePadel($this->cif)) {
            return "<p> <button name='accion' value='verPistasPadel' class='boton2 purpura formaBoton'>Padel</button></p>";
        }

        $conexio->tancarConexio();
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
    
    function getPistas(){
        return $this->pistas;
    }
    
    function getPista($numero){
        return $this->pistas[$numero];
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
