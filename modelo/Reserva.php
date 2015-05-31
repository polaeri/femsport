<?php

class Reserva {

    private $id;
    private $totalJugadores;
    private $fecha_partido;
    private $fecha_reserva;
    private $estado;
    private $privacidad;
    private $maximo_jugadores;
    private $dni_jugador_responsable;
    private $id_pista;

    function __construct($id, $totalJugadores, $fecha_partido, $fecha_reserva, $estado, $privacidad, $maximo_jugadores, $dni_jugador_responsable, $id_pista) {
        $this->totalJugadores = $totalJugadores;
        $this->fecha_partido = $fecha_partido;
        $this->fecha_reserva = $fecha_reserva;
        $this->estado = $estado;
        $this->privacidad = $privacidad;
        $this->maximo_jugadores = $maximo_jugadores;
        $this->dni_jugador_responsable = $dni_jugador_responsable;
        $this->id_pista = $id_pista;
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function getTotalJugadores() {
        return $this->totalJugadores;
    }

    function getFecha_partido() {
        return $this->fecha_partido;
    }

    function getFecha_reserva() {
        return $this->fecha_reserva;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPrivacidad() {
        return $this->privacidad;
    }

    function getMaximo_jugadores() {
        return $this->maximo_jugadores;
    }

    function getDni_jugador_responsable() {
        return $this->dni_jugador_responsable;
    }

    function getId_pista() {
        return $this->id_pista;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTotalJugadores($totalJugadores) {
        $this->totalJugadores = $totalJugadores;
    }

    function setFecha_partido($fecha_partido) {
        $this->fecha_partido = $fecha_partido;
    }

    function setFecha_reserva($fecha_reserva) {
        $this->fecha_reserva = $fecha_reserva;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPrivacidad($privacidad) {
        $this->privacidad = $privacidad;
    }

    function setMaximo_jugadores($maximo_jugadores) {
        $this->maximo_jugadores = $maximo_jugadores;
    }

    function setDni_jugador_responsable($dni_jugador_responsable) {
        $this->dni_jugador_responsable = $dni_jugador_responsable;
    }

    function setId_pista($id_pista) {
        $this->id_pista = $id_pista;
    }


    
    
    
    }