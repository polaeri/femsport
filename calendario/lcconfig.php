<?php
/*
= LuxCal event calendar configuration =

� Copyright 2009-2014 LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

include "../modelo/Session.php";
$sessio = new Session();
$club = $sessio->getSession('CIFclub');

$lcc="3.2.3"; //current LuxCal version
$dbHost="endurorocks.com"; //MySQL server
$dbUnam="femsport"; //database username
$dbPwrd="xpid2015"; //database password
$dbName="calendario"; //database name
$dbPfix=$club;


?>
