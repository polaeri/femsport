<?php ?>
<!DOCTYPE html>
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
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link href="../style/form.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header><img src="logoFemEsport2.png">
            <menu>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Perfil</a></li>

                </ul>
            </menu>
        </header>

        <article>
            <h1>Formulario de Jugador</h1>
            <form method="POST" action="control/controlador.php">
                <input id="nombreUsuario" values="" placeholder="Nombre de Usuario" required/>
                <input id="emailJugador" values="" placeholder="Correo" required/>
                <input id="nombreJugador" values=""  placeholder="Nombre" required/>
                <input id="apellidosJugador" values="" placeholder="Apellidos" required/>
                <input id="dniJugador" values="" placeholder="DNI/NIF" required/>
                <input id="telefonoJugador" values="" placeholder="Telefono" required/>

            </form>

            <form class="contact_form" action="#" id="contact_form" runat="server"> 
                
                <div>
                    <ul> 
                        <li> 
                            <h2>Contactos</h2>
                            <span class="required_notification">* Datos requeridos</span> 
                        </li> <li>
                            
                            <label for="name">Nombre:</label> 
                            <input type="text" placeholder="John Doe" required /> 
                            
                            
                        </li> <li> <label for="email">Email:</label> 
                            <input type="email" name="email"  placeholder="info@developerji.com" required /> 
                            <span class="form_hint" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">Formato correcto: "name@something.com"</span> </li> 
                        
                        
                        <li> <label for="website">Sitio web:</label> <input type="url" name="website" placeholder="http://developerji.com" required pattern="(http|https)://.+" /> 
                            <span class="form_hint">Formato correcto: "http://developerji.com"</span> </li> <li>
                            <label for="message">Mensaje:</label> <textarea name="message" cols="40" rows="6" required></textarea> </li> <li> 
                            <button class="submit" type="submit">Enviar mensaje</button> </li> </ul> </div> </form> </body> </html>

<sidebar>WIDGET FACEBOOK</sidebar>
</article>

<footer>Copyright ©FemSport</footer>
</body>
</html>
