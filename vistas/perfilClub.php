<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <header>
            <img src="style/images/selectRol/logoFemEsport2.png">
            <menu>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </menu>
        </header>

        <article>
            <sidebar>

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasClub">ATRAS</button>

                    </form><br>

                    <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>

            </sidebar>

            <div class="contentClub2">

                <div class="perfil">

                    <div class="perfil1">
                        <h2>Información del Club</h2>
                        <hr>
                        
                        <div class="avatar">
                            
                             <?php
                            $sessio = new Session();
                            $jugador = $sessio->getSession("club");
                            $jugador->printAvatarClub();
                            ?>
                        
                        </div><br>
                         <div class="datosPerfil">
                            <?php
                            $sessio = new Session();
                            $club = $sessio->getSession("club");
                            $club->printClub();
                            ?>
                        </div>
                        <div class="botonDatosPerfil"> 
                        <form action="index.php" method="POST">
                            <p> <button name="accion" value="editarPerfilClub" class="boton2 verde formaBoton ">Editar</button></p>
                        </form>
                             </div>
                    </div>
                    <div class="perfil1">
                        <h2>Información Pistas/Campos</h2>
                        <hr>
                        <br><br>
                        <center>
                        <form action="index.php" method="POST">                            
                            <?php
                            echo $club->existeFutbol();
                            echo"<br>";
                            echo $club->existeBasket();
                            echo"<br>";
                            echo $club->existePadel();
                            echo"<br>";echo"<br>";
                            ?>                            
                        </form>
                       
                         </center>
                    </div>
                    <div class="perfil1">
                         <h2>Insertar Nuevas Pistas/Campos</h2>
                         <hr><br>
                         <center>
                        <h3>Nº Campos de Futbol</h3>
                    <br>
                    <p> 5: <select name="futbol_5"> <?php selectAuto(10); ?></select>   &nbsp     


                        7: <select name="futbol_7"> <?php selectAuto(10); ?></select>  &nbsp
                   
                    11: <select name="futbol_11"> <?php selectAuto(10); ?></select></p><br>                            

                    <h3>Nº Pistas de Basket</h3>
                    <br>

                   <p> <select name="basket"> <?php selectAuto(10); ?></select>      </p>     <br>                           


                   <h3> Nº Campos de Padel</h3>
                   <br>
                       
                       <p><select name="padel"> <?php selectAuto(10); ?></select> </p>  <br> 
                        
                       
                       
                            <p> <button name="accion" value="editarCamposClub" class="boton2 verde formaBoton ">Insertar</button></p>
                            <br>
                       <p>Este modulo actualmente desactivado</p>
                         </center>
                         
                    </div>

                </div>
                </div>
        </article>

        <footer><br>Copyright ©FemSport</footer>
    </body>
</html>

