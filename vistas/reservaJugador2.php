<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-2.1.3.js" type="text/javascript"></script>
        <link href="style/formJugador.css" rel="stylesheet" type="text/css"/>
        

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
                </form><br>
                <form action="index.php" method="POST">
                    <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                </form>

            </sidebar>
            <div class="contentJugador">
                <div class="perfil">
                <br>
                <h3 class="titol3">Estamos a punto de completar la reserva:</h3><br>

                <form action="index.php" method="POST">
                    <h3 class="titol3"> ¿Cuántos jugadores sois?</h3><br>
                    &nbsp <select id="jugadores" name="numJugadores">
                        <?php
                        $sesion = new Session();
                        $sesion;
                        $array = $sesion->getSession("reservaPista");
                        $maximoJugadores = $array['maximoJugadores'];
                        for ($i = 1; $i < $maximoJugadores; $i++) {
                            echo "<option>" . $i . "</option>";
                        }
                        ?> 
                    </select><br><br>
                    <h3 class="titol3">¿ Quieres que otros jugadores puedan participar en tu partido?</h3><br>
                    &nbsp <input type="checkbox" name="privado" value="Privado" id="privado"> <br>
                    <h3 class="titol3">Partido público</h3>  &nbsp <div id="cuantos" hidden>
                        <h3 class="titol3">¿Cuantos?</h3><br>
                       &nbsp  <select id="invitados" name="invitados">                            
                        </select>
                    </div><br><br>
                    <button id="consultar" type="submit" name="accion" value="reservarPista2">RESERVAR</button>

                </form>          
            </div>

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