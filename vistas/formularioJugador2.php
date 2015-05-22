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
                    <li><a href="#Aqui URL">Inicio</a></li>
                </ul>
            </menu>
        </header>
    
    
        <article>
           
            </sidebar>
          
                <!-- multistep form -->
                    <form id="formulario" class="contact_form" id="contact_form" action="index.php" method="POST">
                        <!-- progreso -->
                        <div id="progreso">
                            <li class="active">Cuenta de usuario</li>
                            <li>Datos Personales</li>
                            <li>Sobre ti</li>
                        </div> 
                        <!-- fieldsets -->
                        <fieldset>
                            <h2 class="fs-title">Crear su cuenta</h2>
                            <h3 class="fs-subtitle">Paso 1</h3>
                                <input type="text" name="usuario" placeholder="Nombre Usuario" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 
                                <input type="password" placeholder="Contraseña" name="pwd1" onchange="form.pwd2.pattern = this.value;" required />
                                <input type="password"  name="pwd2" placeholder="Confirmar contraseña" name="pwd2"required /> 
                                <button name="next" class="next boton2 verde formaBoton" />Siguiente</button>
                                
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
                                
                                 <button name="previous" class="previous boton2 anaranjado formaBoton"/>Anterior</button>
                                 <button name="next" class="next boton2 verde formaBoton" />Siguiente</button>
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Detalles Personales</h2>
                            <h3 class="fs-subtitle">Paso 3</h3>
                                <input type="file" name="avatar" placeholder="Imagen Perfil"/>
                                <textarea name="descripcion" cols="40" rows="6" placeholder="Descripción"></textarea>
				<button name="previous" class="previous boton2 anaranjado formaBoton"/>Anterior</button>
                                
                                <input type="submit" name="submit" class="submit action-button" value="Submit" />
                                <!-- BOTON ANTERIOR FORMULARIO -->
                                 <button name='accion' value='registroJugador' class="accion boton2 verde formaBoton ">Confirmar</button>
                               
                                 
            </fieldset>
                    </form>
              
        </article>
     <footer>Copyright ©FemSport</footer>
</body>
</html>