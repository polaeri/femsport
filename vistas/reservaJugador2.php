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
                </form>
                <form action="index.php" method="POST">
                    <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                </form>

            </sidebar>
            <div class="contentJugador">
                <br>
                Estamos a punto de completar la reserva:

                <form action="index.php" method="POST">
                    Cuantos jugadores sois?
                    <select id="jugadores" name="numJugadores">
                        <?php
                        $sesion = new Session();
                        $sesion;
                        $array = $sesion->getSession("reservaPista");
                        $maximoJugadores = $array['maximoJugadores'];
                        for ($i = 1; $i < $maximoJugadores; $i++) {
                            echo "<option>" . $i . "</option>";
                        }
                        ?> 
                    </select><br>
                    Quieres que otros jugadores puedan participar en tu partido?<br>
                    <input type="checkbox" name="privado" value="Privado" id="privado"> Partido público<br>
                    <div id="cuantos" hidden>
                        Cuantos?
                        <select id="invitados" name="invitados">                            
                        </select>
                    </div>
                    <button id="consultar" type="submit" name="accion" value="reservarPista2">RESERVAR</button>

                </form>          
            </div>



        </article>
        <script>
            $(document).ready(function () {
                $('#privado').change(function () {
                    if ($("#privado").is(':checked')) {
                        opcio = $("#jugadores").val();
                        $.post("index.php", {accion: "maximoJugadores", total: opcio}, function (data) {
                            $("#invitados").html(data);
                        });
                        $('#cuantos').show();
                    } else {
                        $('#cuantos').hide();

                    }
                });
                $('#jugadores').change(function () {
                    opcio = $("#jugadores").val();
                    $.post("index.php", {accion: "maximoJugadores", total: opcio}, function (data) {
                        $("#invitados").html(data);
                    });
                });
            });
        </script>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>