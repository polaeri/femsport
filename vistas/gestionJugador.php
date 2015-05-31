
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

            <header>
            <img src="style/images/selectRol/logoFemEsport2.png">
            <menu>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </menu>
        </header>
        </header>
        <img src="../style/images/completo.png" alt=""/>

        <article>
            <sidebar>

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>

             </sidebar>
            
            <div class="contentJugador">
                
                <h1 class="titol2">
                    <?php
                    $sessio = new Session();
                    $jugador = $sessio->getSession("jugador");
                    echo "Bienvenido " . $jugador->getUsuario();
                    ?>
                </h1>
                <div align="center">
                    <form method="POST" action="index.php">
                        <input class="especial" type="image" name="accion" value="perfilJugador" src="style/images/botonPerfilJugador.png" width="250px">
                        &nbsp &nbsp &nbsp &nbsp 
                        <input class="especial" type="image" name="accion" value="reservaJugador" src="style/images/ReservaJugador.png" width="250px">
                        &nbsp &nbsp &nbsp &nbsp 
                        <input class="especial" type="image" name="accion" value="buscaJugador" src="style/images/BuscaJugador.png" width="250px">
                    </form>

                </div>
           </div>
        </article>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
