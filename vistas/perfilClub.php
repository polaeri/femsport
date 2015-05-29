<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasClub">ATRAS</button>

                    </form>

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>

            </sidebar>

            <div class="contentClub2">

                <div class="perfil">

                    <div class="perfil1">
                        <h2>Información del Club</h2>
                        <hr>
                        <p>
                            <?php
                            $sessio = new Session();
                            $club = $sessio->getSession("club");
                            $club->printClub();
                            ?>
                        </p>
                        <form action="index.php" method="POST">
                            <p> <button name="accion" value="editarPerfilClub" class="boton2 verde formaBoton ">Editar</button></p>
                        </form>
                    </div>
                    <div class="perfil1">
                        <h2>Información Pistas/Campos</h2>
                        <hr>
                        <p>
                            Mostrar lista de todos los campos y pistas
                        </p>
                        <form action="index.php" method="POST">                            
                            <?php
                            echo $club->existeFutbol();
                            echo $club->existeBasket();
                            echo $club->existePadel();
                            ?>                            
                        </form>

                        <form action="index.php" method="POST">
                            <p> <button name="accion" value="editarCamposClub" class="boton2 verde formaBoton ">Editar</button></p>
                        </form>
                    </div>


                </div>
                </div>
        </article>

        <footer><br>Copyright ©FemSport</footer>
    </body>
</html>

