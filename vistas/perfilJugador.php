
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
                        <button type="submit" class="boton anaranjado formaBoton "  name="accion" value="atrasJugador">ATRAS</button>
                       
                    </form><br>
                    <form action="index.php" method="POST">
                       
                        <button type="submit" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal" name="accion" value="salir">SALIR</button>
                    </form>
            </sidebar>
            <div class="contentJugador">

                <div class="perfil">
                                   
                <div class="perfil1">
                  
                    <h2>Información Personal</h2>
                    <hr>
                    
                    <div class="avatar">
                        
                    </div>
                        
                        
                       
                   
                    <div class="datosPerfil">
                    
                        <?php
                        $sessio = new Session();
                        $jugador = $sessio->getSession("jugador");
                        $jugador->printPerfilJugador();
                        ?>
                   
                    </div> 
                
                    <div class="botonDatosPerfil"> 
                    <form action="index.php" method="POST">
                        <p> <button name="accion" value="editarPerfilJugador" class="boton2 verde formaBoton ">Editar</button></p>
                    </form>
                </div>
                </div>
                <div class="perfil1">
                    <h2>Historial Reservas</h2>
                    <hr>
                    
                </div>
                
                 <div class="perfil1">
                    <h2>Partidos Jugados</h2>
                    <hr>
                    
                </div>
                    </div>
            </div>

        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>

