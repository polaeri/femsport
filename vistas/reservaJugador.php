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
                <br><br><br>
                <form action="index.php" method="POST">
                    <select name= "deporte" id="deporte">
                        <option value="0">Escoje Deporte</option>
                        <option value="futbol_11">Futbol 11</option>
                        <option value="futbol_7">Futbol 7</option>
                        <option value="futbol_5">Futbol 5</option>
                        <option value="basket">Basket</option>
                        <option value="padel">Padel</option>
                    </select>
                    <select name="club" id="clubs" hidden>                    
                    </select>
                    <input type="date" id="fecha" name="fecha" hidden>                
                    <button id="consultar" type="submit" name="accion" value="consultar" hidden>CONSULTAR</button>
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
