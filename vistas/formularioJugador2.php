<?php ?>
<!--
AYUDAS 
http://www.the-art-of-web.com/javascript/validate-password/
-->
<html>
    <head>
        <title>FemSport</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="robots" content="index,follow">

        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
        <!-- jQuery easing plugin -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
        <script src="style/formulario/js/funciones.js" type="text/javascript"></script>
        <link href="style/formulario/css/estilo.css" rel="stylesheet" type="text/css"/>

        <link href="style/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="style/formJugador.css" rel="stylesheet" type="text/css"/>
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

                <form action="index.php" method="POST" >
                    <button type="submit" class="boton azul formaBoton "  name="accion" value="salir">SALIR</button>
                </form>
            </sidebar>
            <div class="contentJugador">

                 <form id="formulario" class="contact_form" action="index.php" method="POST" enctype="multipart/form-data">
                    <!-- <span class="required_notification">* Datos Requeridos</span>" -->
                    <!-- progreso --><br>
                    <ul id="progreso">
                        <li class="active">Cuenta de usuario</li>
                        <li>Datos Personales</li>
                        <li>Sobre ti</li>
                    </ul> 
                    <br><br>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Crear su cuenta</h2>
                        <h3 class="fs-subtitle">Paso 1</h3>
                        <input type="text" name="usuario" placeholder="Nombre Usuario" placeholder="Nombre Usuario" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-\{0-9}]{2,48}" required /> 
                        <input type="password" placeholder="Contraseña" name="pwd1" onchange="form.pwd2.pattern = this.value;" required />
                        <input type="password"  name="pwd2" placeholder="Confirmar contraseña" name="pwd2"required /> 
                        <input type="button" name="next" class="next action-button" value="Siguiente" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Tus datos</h2>
                        <h3 class="fs-subtitle">Paso 2</h3>
                        <input type="text" name="nombre" placeholder="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 
                        <input type="text" name="apellidos" placeholder="Apellidos" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 
                        <input type="DNI" name="dni" placeholder="DNI/NIF" pattern="^[0-5][0-9]{7}[A-Z]$" required /> 
                        <span class="form_hint" >Formato:"12345678A"</span>
                        <input type="email" name="email" placeholder="Correo electronico" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" required />
                        <span class="form_hint" >Formato:"nombre@dominio.com"</span> 
                        <input type="tel" name="telefono" placeholder="Telefono" pattern="^[9|8|7|6|5]\d{8}$" required /> 

                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="button" name="next" class="next action-button" value="Siguiente" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Detalles Personales</h2>
                        <h3 class="fs-subtitle">Paso 3</h3>
                        <input type="file" name="avatar" accept="image/gif, image/jpeg, image/png" placeholder="Imagen Perfil"/>
                        <textarea name="descripcion" cols="40" rows="6" placeholder="Descripción"></textarea>
                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="submit" name='accion' value="Registrar" class="submit action-button" />


                    </fieldset>
                </form>

                
                <?php
                if (isset($jugadorValidar)) {
                   
                    echo "<div class='errorFormJug'>";
                    
                    if (substr($jugadorValidar, 0, -2) == 1) {
                        echo "<img src='style/images/error.png' width='20px' />&nbsp";
                        echo "Error de nombre de Usuario duplicado<br>";
                    }

                    if (substr($jugadorValidar, -2, 1) == 1) {
                        echo "<img src='style/images/error.png' width='20px' />&nbsp";
                        echo "Error de DNI duplicado<br>";
                    }
                    if (substr($jugadorValidar, -1) == 1) {
                        echo "<img src='style/images/error.png' width='20px' />&nbsp";
                        echo "Error de EMAIL duplicado<br>";
                    }
                    echo "</div>";
//                    echo "<div class='errorFormJug'>";
//                    echo "<img src='style/images/error.png' width='40px' />&nbsp";
//                    echo "Error. Vuelve a identificarte</div>";
                   
                     $jugadorValidar = "000";
                }
                ?>





            </div>


        </article>
        <footer>Copyright ©FemSport</footer>
    </div>
</div>
</body>
</html>
