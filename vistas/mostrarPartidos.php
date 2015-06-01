<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-2.1.3.js" type="text/javascript"></script>
        <link href="../style/formJugador.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <header><img src="style/images/selectRol/logoFemEsport2.png">

            <menu>
                <ul>
                    <li><a href="#Aqui URL">Inicio</a></li>

                </ul>

            </menu>
        </header>

        <article>
            <sidebar>

                <form action="index.php" method="POST">
                    <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasJugador">ATRAS</button>
                </form><
                <form action="index.php" method="POST">
                    <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                </form>

            </sidebar>
            <div class="contentJugador">                
                <?php
                $sessio = new Session();
                $reservas = $sessio->getSession("arrayDisponibles");
                echo "<h1>Eventos de " . $sessio->getSession("deporteBuscado") . "</h1>";
                if (isset($reservas)) {
                    foreach ($reservas as $key => $value) {
                        echo "<form action='index.php' method='POST'>";
                        echo $value->printReserva();
                        echo "</form>";
                    }
                } else {
                    echo "<h2>No hay eventos disponibles</h2>";
                }
                ?>                
            </div>
        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>






