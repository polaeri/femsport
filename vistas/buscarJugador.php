
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

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>


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
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>
                </div>

                </div>
            </sidebar>
            <div class="content">
                <h1 class="titol">¡Selecciona el deporte para buscar partidos en curso!</h1>



                <div align="center">
                    <form method="POST" action="index.php">


                        <input class="especial" type="image" name="accion" value="nuevoJugador" src="style/images/iconoDeportes/basket.png" width="100px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="nuevoClub" src="style/images/iconoDeportes/padel.png" width="100px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp

                        <input class="especial" type="image" name="accion" value="nuevoClub" src="style/images/iconoDeportes/tenis.png" width="100px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="nuevoClub" src="style/images/iconoDeportes/futbol11.png" width="100px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="nuevoClub" src="style/images/iconoDeportes/futbol7.png" width="100px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="nuevoClub" src="style/images/iconoDeportes/futbol5.png" width="100px">
                    </form>
                </div>


            </div>



        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>
