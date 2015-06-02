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
    private $cif_club;
    private $deporte;

    function __construct($id, $totalJugadores, $fecha_partido, $fecha_reserva, $estado, $privacidad, $maximo_jugadores, $dni_jugador_responsable, $id_pista, $cif_club) {
        $this->totalJugadores = $totalJugadores;
        $this->fecha_partido = $fecha_partido;
        $this->fecha_reserva = $fecha_reserva;
        $this->estado = $estado;
        $this->privacidad = $privacidad;
        $this->maximo_jugadores = $maximo_jugadores;
        $this->dni_jugador_responsable = $dni_jugador_responsable;
        $this->id_pista = $id_pista;
        $this->id = $id;
        $this->cif_club = $cif_club;
    }

    function guardarReserva() {
        $conexio = new Conexio();
        $conexio->guardarReserva($this->totalJugadores, $this->fecha_partido, $this->fecha_reserva, $this->estado, $this->privacidad, $this->maximo_jugadores, $this->dni_jugador_responsable, $this->id_pista);
        $conexio->tancarConexio();
    }

    function getId() {
        return $this->id;
    }

    function getDeporte() {
        return $this->deporte;
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

    function getCifClub() {
        return $this->cif_club;
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

    function setCifClub($cifClub) {
        $this->cif_club = $cifClub;
    }

    function printReserva() {
        $conexio = new Conexio();
        $nombre = $conexio->buscarNomClub($this->cif_club);
        $deporte = $conexio->buscarTipoPista($this->id_pista);
        $conexio->tancarConexio();
        return "<br>Total Jugadores = " . $this->totalJugadores .
                "<br>Fecha Partido = " . $this->fecha_partido .
                "<br>Maximo Jugadores = " . $this->maximo_jugadores .
                "<br> Club = " . $nombre .
                "<br> Deporte = " . $deporte .
                "<p> <button name='accion' value='nuevoJugadorEvento' class='boton2 verde formaBoton'>Añadirse</button></p>" .
                "<input type='hidden' name='id_reserva' value='" . $this->id . "'> ";
    }

    function printReservaHistorial() {
        $conexio = new Conexio();
        $nombre = $conexio->buscarNomClub($this->cif_club);
        $deporte = $conexio->buscarTipoPista($this->id_pista);
        $conexio->tancarConexio();
        return "<br>Total Jugadores = " . $this->totalJugadores .
                "<br>Fecha Partido = " . $this->fecha_partido .
                "<br>Maximo Jugadores = " . $this->maximo_jugadores .
                "<br> Club = " . $nombre .
                "<br> Deporte = " . $deporte;
    }

    function actualizarReserva() {
        $conexio = new Conexio();
        $resultat = $conexio->actualizarReserva($this);
        $conexio->tancarConexio();
        if ($resultat) {
            return true;
        } else {
            return false;
        }
    }

}
