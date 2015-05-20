
!DOCTYPE html>
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

            </sidebar>
            
            <div class="content">
                <ul>
                    <?php
                    $sessio = new Session();
                    $jugador = $sessio->getSession("jugador");
                    $jugador->printPerfilJugador();
                    ?>
                </ul>
                <form action="index.php" method="POST">
                    <button name="accion" value="editarPerfilJugador">Editar</button>
                </form>

            </div>

    </article>

    <footer>Copyright ©FemSport</footer>
</body>
</html>

