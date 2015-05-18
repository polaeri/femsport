<?php ?>
!DOCTYPE html>
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
        <link href="style/form.css" rel="stylesheet" type="text/css"/>


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
               
               <form class="contact_form" action="index.html" method="POST" id="contact_form" runat="server"> 
                
                    <ul> 
                        <li> 
                            <h2>Formulario Jugador</h2>
                            <span class="required_notification">* Datos requeridos</span>
                        </li> 
                         <li>
                             <input type="text" name="accion" value="nombre" placeholder="Nombre" pattern="[A-Za-z]" required /> 
                         </li> 
                         <li>
                             <input type="text" name="accion" value="apellidos" placeholder="Apellidos" required /> 
                         </li> 
                         <li>
                             <input type="DNI" name="accion" value="dni" placeholder="DNI/NIF" pattern="^[0-5][0-9]{7}[A-Z]$" required /> 
                            <span class="form_hint" >Formato correcto: "12345678A"</span> 
                         <li>
                             <input type="tel" name="accion" value="telefono" placeholder="Telefono" pattern="^[9|8|7|6]\d{8}$" required /> 
                         </li>              
                         <li> 
                            <input type="email" name="accion" value="email" placeholder="Correo electronico" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" required />
                            <span class="form_hint" >Formato correcto: "nombre@dominio.com"</span> 
                         </li> 
                        <li>
                             <input type="text" name="accion" value="usuario" placeholder="Nombre Usuario" required /> 
                         </li>
                         <li>
                             <input type="password" placeholder="Contraseña" name="accion" value="pass" name="pwd1" onchange="form.pwd2.pattern = this.value;" required />
                         </li> 
                         <li>
                             <input type="password"  name="accion" value="pwd2" placeholder="Confirmar contraseña" name="pwd2"required /> 
                         </li> 
                         <li>
                            <input type="file" name="accion" value="avatar" placeholder="Imagen Perfil"/>
                         </li>
                         <li>
                               <textarea name="accion" value="descripcion" cols="40" rows="6" placeholder="Descripción"></textarea>  
                         </li>
                          <li>
                            <button class="submit" name='accion' value='registroJugador'>Confirmar</button> 
                            </li> 
                    </ul> 
                    
                    </form> 
            </div> 
        </article>
        <footer>Copyright ©FemSport</footer>
    </body>
</html>
