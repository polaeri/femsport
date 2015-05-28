              
<?php

$conexio = new Conexio();
$sesion = new Session();
$clubs = $conexio->mostrarClubs($sesion->getSession('deporte'));
echo "<option value='0'>Escoje Club</option>";
for ($i = 0; $i < sizeof($clubs); $i++) {
    $club = $clubs[$i];
    echo "<option name='club' value='" . $club->getCIF() . "'>" . $club->getNombre() . "</option>";
}
?>