<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


<!--
To change this license header, choose License Headers in Project Properties.
and open the template in the editor.
-->
<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="style/login/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="style/login/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="style/login/js/bootstrap.min.js" type="text/javascript"></script>
      

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

                <!-- Trigger the modal with a button -->
                <button type="button" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal">LOGIN</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">

                    <!--login modal-->
                    <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                                    <h1 class="text-center"></h1>
                                </div>
                                <div class="modal-body">
                                    <form class="form col-md-12 center-block" action="index.php" method="POST">                                                            
                                        <div class="form-group">
                                            <input type="text" name="usuario" class="form-control input-lg" placeholder="Usuario" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="contrasena" class="form-control input-lg" placeholder="Password" required="">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-lg btn-block" name="accion" value="login">Iniciar sesión</button>
                                            <span class="pull-right"><a href="#"></a></span><span><a href="#">Recuperar Contraseña</a></span>
                                           
                                        </div>
                                        
                                        
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="<?php// elimiarError1();?>">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </sidebar>
            <div class="contentRol">
                <h1 class="titol">¡Registrate!</h1>

                <div align="center">
                    <form method="POST" action="index.php">
                        <input class="especial" type="image" name="accion" value="nuevoJugador" src="style/images/selectRol/jugador2.png" width="250px">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input class="especial" type="image" name="accion" value="nuevoClub" src="style/images/selectRol/club.png" width="250px">
                    </form>
                </div>
                <h4>Únete ya a nuestra comunidad para empezar a reservar partidos o participar en encuentros con otros usuarios. </h4>
                    <h4>Selecciona si eres un jugador o un club para registrarte.</h4>
                    
                    
                    <?php  
                                        
                                          /// DALE COLOR A ESTO IVAN
                                            if(isset( $errorInicio)){
                                                
                                                echo "<div class='error'>";
                                                echo "<img src='style/images/error.png' width='20px' />&nbsp";
                                                echo  "".$errorInicio."</div>";
                                            }
                                        ?>

            </div>

            

        </article>

        <footer>Copyright ©FemSport</footer>
        </div>
    </body>
</html>
