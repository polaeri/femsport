<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/form.css" rel="stylesheet" type="text/css"/>
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
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasClubPerfil">ATRAS</button>

                    </form>
                    <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>

                </div>

            </sidebar>

            <div class="content">

                <div class="perfil">
                    <h2>Editar Campos/Pistas</h2>
                    <hr>
                    <form action="index.php" method="POST" class="contact_form" id="contact_form" runat="server">
                        <div class="subperfil1" >
                            <?php
                            $sessio = new Session();
                            $club = $sessio->getSession("club");
                            for ($i = 0; $i < sizeof($club->getPistas()); $i++) {
                                $pista = $club->getPista($i);
                                if ($pista->getTipo() === 'basket') {
                                    echo $pista->printPista();
                                }
                            }
                            ?>
                        </div>

                        <div class="subperfil2">
                        </div>
                        <div class="subperfil3">

                            <button name="accion" value="EditarPerfilPista" class="boton2 verde formaBoton ">Editar</button>

                        </div> 
                    </form>

                </div>
        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>