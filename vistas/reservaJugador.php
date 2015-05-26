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
                    <li><a href="#Aqui URL">Inicio</a></li>




                </ul>


            </menu>
        </header>

        <article>
            <sidebar>


                <div class="container">

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasJugador">ATRAS</button>

                    </form>
                    <form action="index.php" method="POST">

                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>

                </div>

                </div>
            </sidebar>
            <div class="content">

                <select id="deporte">
                    <option>Escoje Deporte</option>
                    <option>Futbol 11</option>
                    <option>Futbol 7</option>
                    <option>Futbol 5</option>
                    <option>Basket</option>
                    <option>Padel</option>
                    ?>
                </select>
                <select id="clubs" hidden>
                    <option>Escoje Club</option>
                    <?php
                    $conexio = new Conexio();
                    $clubs = $conexio->mostrarClubs($deporte);
                    for ($i = 0; $i < sizeof($clubs); $i++) {
                        $club = $clubs[$i];
                        echo "<option name='Club' value='" . $club->getCIF() . "'>" . $club->getNombre() . "</option>";
                    }
                    ?>
                </select>
                <script>
                    $(document).ready(function () {
                        $("#deporte").change(function () {
                            $("#clubs").show();
                        });
                    });
                </script>
            </div>



        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>
