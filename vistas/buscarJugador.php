
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
                <h1 class="titol2">¡Selecciona el deporte para buscar partidos en curso!</h1><br>



                <div align="center">
                    <form method="POST" action="index.php">

                         
                        <input class="especial" type="image" name="accion" value="buscaBasket" src="style/images/iconoDeportes/basket.png" width="150px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="buscaPadel" src="style/images/iconoDeportes/padel.png" width="150px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="buscaFutbol11" src="style/images/iconoDeportes/futbol11.png" width="150px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="buscaFutbol7" src="style/images/iconoDeportes/futbol7.png" width="150px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="buscaFutbol5" src="style/images/iconoDeportes/futbol5.png" width="150px">
                    </form>
                </div>


            </div>



        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>
