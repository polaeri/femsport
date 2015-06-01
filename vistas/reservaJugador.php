<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-2.1.3.js" type="text/javascript"></script>
        <link href="style/formulario/css/estilo.css" rel="stylesheet" type="text/css"/>
         <link href="style/formJugador.css" rel="stylesheet" type="text/css"/>

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

                <form action="index.php" method="POST">
                    <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasJugador">ATRAS</button>
                </form><br>
                <form action="index.php" method="POST">
                    <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                </form>

            </sidebar>
            <div class="contentJugador">
                <br>
                <h3 class="titol">Selecciona tu deporte favorito y realiza tu reserva en un club</h3>
                <br><br>
                <form action="index.php" method="POST">
                    <center>
                        <div class="perfil3">
                            <img src="style/images/selectRol/jugador2.png" width="200px" height="200px"/><br><br>
                            <select name= "deporte" id="deporte">
                                <option value="0">Escoje Deporte</option>
                                <option value="futbol_11">Futbol 11</option>
                                <option value="futbol_7">Futbol 7</option>
                                <option value="futbol_5">Futbol 5</option>
                                <option value="basket">Basket</option>
                                <option value="padel">Padel</option>
                            </select>
                        </div>
                        <div class="perfil3">
                            <img src="style/images/selectRol/club.png" width="200px" height="200px"/><br><br>
                            <select name="club" id="clubs" hidden>                    
                            </select>
                        </div>
                        <div class="perfil3">
                         <img src="style/images/botonReservas.png" width="200px" height="200px"/><br><br>
                         <input type="date" id="fecha" name="fecha" hidden><br><br><br>           
                    <button id="consultar" type="submit" name="accion" value="consultar" hidden >CONSULTAR</button>
                    </div>
                    </center>
                </form>            
                <script>
                    $(document).ready(function () {
                        $("#deporte").change(function () {
                            opcio = $("#deporte").val();
                            $.post("index.php", {accion: "mostrarClubs", eleccion: opcio}, function (data) {
                                $("#clubs").html(data);
                            });
                            $("#clubs").show();
                        });
                        $("#clubs").change(function () {
                            $("#fecha").show();
                        });
                        $("#fecha").change(function () {
                            $("#consultar").show();
                        });
                    });
                </script>
            </div>



        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>
