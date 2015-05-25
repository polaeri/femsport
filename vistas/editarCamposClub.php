
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

                <div class="perfil3">
                    <h2>Editar Campos/Pistas</h2>
                    <hr>
                     <form action="index.php" method="POST" class="contact_form" id="contact_form" runat="server">
                    <div class="subperfil1" >
                   
                        Mostras lista campos/pistas para poder editarlos      
                            </div>
                    
                        <div class="subperfil2">
                         </div>
                    <div class="subperfil3">
                      
                        <button name="accion" value="cancelarEditarPerfilClub" class="boton2 colorRojo formaBoton ">Cancelar</button>
                        <button name="accion" value="guardarEditarPerfilClub" class="boton2 verde formaBoton ">Guardar</button> 
                  
                    </div> 
                    </form>
                   
                </div>
        </article>

        <footer>Copyright ©FemSport</footer>
    </body>
</html>