<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="style/login/css/bootstrap.min2.css" rel="stylesheet" type="text/css"/>
        <script src="style/login/js/bootstrap.min.js" type="text/javascript"></script>


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
                     
                        <button type="submit" class="boton azul formaBoton "  name="accion" value="salir">SALIR</button>
                    </form>

                </div>

                </div>
            </sidebar>
            <div class="content">
                <h1 class="titol2">
                
                 <?php
                    $sessio = new Session();
                    $club = $sessio->getSession("club");
                    echo "Gestor club " . $club->getNombre();
                    ?>
                    
                
                </h1>



                <div align="center">
                    <form method="POST" action="index.php">
                        <input class="especial" type="image" name="accion" value="perfilClub" src="style/images/botonPerfil.png" width="250px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                          <!-- Trigger the modal with a button -->
                        <input class="especial" type="image" name="accion" value="calendario" src="style/images/botonReservas.png" width="250px" data-toggle="modal" data-target="#myModal">
                    </form>
                    
                    <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">

                    <!--login modal-->
                    <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h1 class="text-center">Calendario</h1>
                                </div>
                                <div class="modal-body">
                                    
                                    
                                    <iframe src="calendario/index.php" width="900px" height="600px">
                                    </iframe>
                                    
                                    
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


            </div>



        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>
