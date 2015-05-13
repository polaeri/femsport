<?php



?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <header><img src="logoFemEsport2.png">
            <menu>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Perfil</a></li>
                    
                </ul>
            </menu>
        </header>
        
        <article>
            <h1>Formulario de Jugador</h1>
            <form method="POST" action="control/controlador.php">
                <input id="nombreUsuario" values="" placeholder="Nombre de Usuario" required/>
                <input id="emailJugador" values="" placeholder="Correo" required/>
                <input id="nombreJugador" values=""  placeholder="Nombre" required/>
                <input id="apellidosJugador" values="" placeholder="Apellidos" required/>
                <input id="dniJugador" values="" placeholder="DNI/NIF" required/>
                <input id="telefonoJugador" values="" placeholder="Telefono" required/>
                
               
                
                
            </form>
        
        
        <sidebar>WIDGET FACEBOOK</sidebar>
        </article>
        
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
