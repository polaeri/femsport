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

                <div class="perfil">
                    <p>Información Del Club</h2></p>
                    <hr>
                    <p>
                        <?php
                        $sessio = new Session();
                        $club = $sessio->getSession("club");
                        $club->printClub();
                        ?>
                    </p>
                    <form action="index.php" method="POST">
                        <p> <button name="accion" value="editarPerfilClub">Editar</button></p>
                    </form>
                </div>
            </div>

        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>

