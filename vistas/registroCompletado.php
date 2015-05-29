<?php ?>

<!--
AYUDAS 
http://www.the-art-of-web.com/javascript/validate-password/
-->
<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
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
                    <li><a href="#Aqui URL">Inicio</a></li>
                </ul>
            </menu>
        </header>

        <article>
            <sidebar>
              
            </sidebar>
            
            <div class="contentRol">
                <center>
                <h2>Registro Completo</h2>
                <img src="style/images/completo.png" alt="" width="200px" height="200px"/>
                <br>
                  <!-- Trigger the modal with a button -->
                    <button type="button" class="boton azul formaBoton " data-toggle="modal" data-target="#myModal">LOGIN</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
              
                                        <!--login modal-->
                                        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h1 class="text-center">Login</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form col-md-12 center-block" action="index.php" method="POST">                                                            
                                                            <div class="form-group">
                                                                <input type="text" name="usuario" class="form-control input-lg" placeholder="Usuario">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="contrasena" class="form-control input-lg" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-primary btn-lg btn-block" name="accion" value="login">Iniciar sesión</button>
                                                                <span class="pull-right"><a href="#"></a></span><span><a href="#">Recuperar Contraseña</a></span>
                                                            </div>
                                                        </form>
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
                </center>
            </div> 
        </article>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
