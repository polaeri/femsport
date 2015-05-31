<?php

$conexio = new Conexio();
$sesion = new Session();
$array = $sesion->getSession("reservaPista");
$maximoJugadores = $array['maximoJugadores'];

$totalJugadores = $sesion->getSession("maximoJugadores");
$resta = $maximoJugadores - $totalJugadores;
for ($i = 1; $i < $resta; $i++) {

    echo "<option>" . $i . "</option>";
}
?>