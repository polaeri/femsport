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

                <div class="container">
                    
                    
                     <form action="index.php" method="POST">
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasClub">ATRAS</button>
                       
                    </form>

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>

                </div>

            </sidebar>

            <div class="content">

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
                        
                         <p> <button name="accion" value="editarCamposClub" class="boton2 purpura formaBoton ">Futbol</button></p>
                          <p> <button name="accion" value="editarCamposClub" class="boton2 purpura formaBoton ">Basket</button></p>
                           <p> <button name="accion" value="editarCamposClub" class="boton2 purpura formaBoton ">Padel</button></p>
                        
                    </form>
                    
                    <form action="index.php" method="POST">
                        <p> <button name="accion" value="editarCamposClub" class="boton2 verde formaBoton ">Editar</button></p>
                    </form>
                </div>
           
                <div class="perfil1">
                     <h2>.</h2>
                    <hr>
                
                </div>
                  
            </div>
        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>

