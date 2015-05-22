<?php
class Pista {

    private $cifClub;
    private $id;
    private $tipo;
    private $numeroTipo;
    private $direccion;
    private $descripcion;
    private $disponibilidad;
    private $maximoJugadores;
    
    function __construct($cifClub, $id, $tipo, $numeroTipo, $direccion, $descripcion, $disponibilidad, $maximoJugadores) {
        $this->cifClub = $cifClub;
        $this->id = $id;
        $this->tipo = $tipo;
        $this->numeroTipo = $numeroTipo;
        $this->direccion = $direccion;
        $this->descripcion = $descripcion;
        $this->disponibilidad = $disponibilidad;
        $this->maximoJugadores = $maximoJugadores;
    }
    
    function getCifClub() {
        return $this->cifClub;
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }
    
    function getNumeroTipo() {
        return $this->numeroTipo;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getDisponibilidad() {
        return $this->disponibilidad;
    }

    function getMaximoJugadores() {
        return $this->maximoJugadores;
    }

    function setCifClub($cifClub) {
        $this->cifClub = $cifClub;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function setNumeroTipo($numeroTipo) {
        $this->numeroTipo = $numeroTipo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }

    function setMaximoJugadores($maximoJugadores) {
        $this->maximoJugadores = $maximoJugadores;
    }


}