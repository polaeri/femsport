<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-2.1.3.js" type="text/javascript"></script>

    </head>
    <body>
        <header><img src="style/images/selectRol/logoFemEsport2.png">

            <menu>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </menu>
        </header>
        <article>
            <sidebar>
                <div class="container">
                    <form action="index.php" method="POST">
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasJugador">ATRAS</button>
                    </form><br>
                    <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                   
                </div>
                </div>
            </sidebar>            
            <div class="contentJugador">
                <br>
                 <h3 class="titol2">Selecciona la hora de la pista deseada</h3>
                 <br>
                <div class="subperfilhorario">
                <?php
                $conexioCalendario = new ConexioCalendario();
                $sessio = new Session();
                $conexioCalendario->mostrarHorarios($sessio->getSession('arrayHorariosOcupados'));                
                ?>
                    
                    </div>
            </div>
        </article>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
