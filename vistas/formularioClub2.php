<?php 


?>

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
                    <li><a href="#Aqui URL">Inicio</a></li>
                </ul>
            </menu>
        </header>

        <article>
            <sidebar>
                
                <form action="index.php" method="POST">
                    <button type="submit" class="boton azul formaBoton "  name="accion" value="salir">SALIR</button>
                </form>
            </sidebar>
            <div class="contentClub">
                <?php if(isset($validar)){
                    
                    $validar=false;
                    echo "<script language='JavaScript'>"; 
                    echo "alert('Error. Vuelve a identificarte');"; 
                    echo "</script>";                    
                    
                } ?>
            <form id="formulario" class="contact_form" action="index.php" method="POST">
                <br>
                <!-- progreso -->
                <ul id="progreso">
                    <li class="active">Cuenta</li>
                    <li>Datos</li>
                    <li>Pistas</li>
                </ul> 
                <br><br>
                <!-- fieldsets -->

                <fieldset>

                    <h2 class="fs-title">Crear su cuenta</h2>
                    <h3 class="fs-subtitle">Paso 1</h3>
                    <input type="dni" name="cif" placeholder="CIF" maxlength="9" pattern="^[0-5][0-9]{7}[A-Z]$" required /> 
                    <span class="form_hint" >Formato correcto: "12345678A"</span> 
                    <input type="password" placeholder="Contraseña" name="pwd1" maxlength="20" onchange="form.pwd2.pattern = this.value;" required />
                    <input type="password"  name="pwd2" placeholder="Confirmar contraseña" maxlength="20"name="pwd2"required /> 
                    <input type="button" name="next" class="next action-button" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Tus datos del club</h2>
                    <h3 class="fs-subtitle">Paso 2</h3>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 
                    <input type="tel" name="telefono" placeholder="Telefono" maxlength="12" pattern="^[9|8|7|6|5]\d{8}$" required /> 
                    <input type="tel" name="telefono2" placeholder="Telefono 2" maxlength="12" pattern="^[9|8|7|6|5]\d{8}$"/> 
                    <input type="text" name="direccion" placeholder="Dirección" maxlength="80" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 
                    <input type="email" name="email"  placeholder="Correo electronico" maxlength="50"  pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" required />
                    <span class="form_hint" >Formato correcto: "nombre@dominio.com"</span> 
                    <input type="url" name="web" placeholder="Página Web" value="http://" maxlength="100"  pattern="^http://www.[a-zA-Z0.9._-]{4,}$" required />
                    <span class="form_hint" >Formato correcto: "http://www.dirección.com""</span> 
                    <input type="file" name="avatar" accept="image/gif, image/jpeg, image/png" placeholder="Imagen Perfil"/>
                    <textarea name="descripcion" value="descripcion" cols="40" rows="6" maxlength="300" placeholder="Descripción"></textarea> 

                    <input type="button" name="previous" class="previous action-button" value="Anterior" />
                    <input type="button" name="next" class="next action-button" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Información pistas disponibles</h2>
                    <h3 class="fs-subtitle">Paso 3</h3>

                    <p>Nº Campos de Futbol</p>
                    <hr><br>
                    <p> 5: <select name="futbol_5"> <?php selectAuto(10); ?></select>   &nbsp          


                   7: <select name="futbol_7"> <?php selectAuto(10); ?></select>   &nbsp                      

                   
                    11: <select name="futbol_11"> <?php selectAuto(10); ?></select></p><br>                            

                    <p>Nº Pistas de Basket</p>
                    <hr><br>

                   <p> <select name="basket"> <?php selectAuto(10); ?></select>      </p>     <br>                           


                   <p> Nº Campos de Padel</p>
                   <hr><br>
                       
                       <p><select name="padel"> <?php selectAuto(10); ?></select> </p>  <br> 

                    <input type="button" name="previous" class="previous action-button" value="Anterior" />
                    <input type="submit" name='accion' value="Registrarse" class="submit action-button" />
                </fieldset>
            </form>


        </div> 
    </article>
    <footer>Copyright ©FemSport</footer>
</body>
</html>
