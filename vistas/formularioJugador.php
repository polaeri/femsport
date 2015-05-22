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
                <div class="container">

                </div>
            </sidebar>

            <div class="content">

                <form class="contact_form" action="index.php" method="POST" id="contact_form" runat="server"> 


                    <h2>Formulario Jugador</h2>
                    <hr>
                    <span class="required_notification">* Datos requeridos</span>
                    <div class="contenido">
                        <p>Datos personales</p>

                        <input type="text" name="nombre" placeholder="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 

                        <input type="text" name="apellidos" placeholder="Apellidos" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 

                        <input type="DNI" name="dni" placeholder="DNI/NIF" pattern="^[0-5][0-9]{7}[A-Z]$" required /> 
                        <span class="form_hint" >Formato:"12345678A"</span> 

                        <input type="tel" name="telefono" placeholder="Telefono" pattern="^[9|8|7|6|5]\d{8}$" required /> 

                        <input type="email" name="email" placeholder="Correo electronico" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" required />
                        <span class="form_hint" >Formato:"nombre@dominio.com"</span> 

                    </div>
                    <div class="contenido2">
                        <p>Usuario</p>

                        <input type="text" name="usuario" placeholder="Nombre Usuario" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /> 
                        <input type="password" placeholder="Contraseña" name="pwd1" onchange="form.pwd2.pattern = this.value;" required />
                        <input type="password"  name="pwd2" placeholder="Confirmar contraseña" name="pwd2"required /> 

                    </div>
                    
                    <div class="contenido3">
                    <p>Sobre ti</p>
                    
                        <input type="file" name="avatar" placeholder="Imagen Perfil"/>
                    
                        <textarea name="descripcion" cols="40" rows="6" placeholder="Descripción"></textarea>  
                    </div>
                    <div class="contenido4">
                        <button name='accion' value='registroJugador' class="boton2 verde formaBoton ">Confirmar</button>
                  </div>

                </form> 

            </div> 
        </article>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
