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
            <center>
            
            <div class="contentJugador">
                <center>
                    <br><br>
                <img src="style/images/completo.png" alt="" width="200px" height="200px"/>
                <br>
                
                <div class="success">Reserva Realizada Correctamente</div>
                <br>
                <form action="index.php" method="POST">
                        <button type="submit" class="boton azul formaBoton "  name="accion" value="atrasJugador">SALIR</button>
                    </form>
                </center>
              
            </div> 
        </article>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
