<?php ?>

<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/estilo.css">
    </head>
    <body>
        <header><img src="style/images/logoFemEsport2.png">
            <menu>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Perfil</a></li>
                    
                </ul>
            </menu>
        </header>
        
        <article>
            <form class="contact_form" action="index.html" method="POST" id="contact_form" runat="server"> 
                
                <div>
                    <ul> 
                        <li> 
                               <h2>Formulario Jugador</h2>
                            <span class="required_notification">* Datos requeridos</span> 
                        </li> 
                        
                        <li>
                 
                            <input type="text" name="nombre" placeholder="Nombre" required /> 
               
                         </li> 
                         
                         <li>
                 
                             <input type="text" name="apellidos" placeholder="Apellidos" required /> 
               
                         </li> 
                  
                         <li>
                 
                            <input type="DNI" name="dni" placeholder="DNI/NIF" required /> 
               
                         </li> 
                         
                         <li>
                 
                            <input type="tel" name="telefono" placeholder="Telefono" required /> 
               
                         </li> 
                     
                                         
                         <li> 
                            <input type="email" name="email"  placeholder="Correo electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /> 
                            <span class="form_hint" >Formato correcto: "nombre@dominio.com"</span> 
                         </li> 
                        
                        <li>
                 
                             <input type="text" name="usuario" placeholder="Nombre Usuario" required /> 
               
                         </li> 
                         
                         <li>
                 
                             <input type="password" name="contrasena" placeholder="Contraseña" required /> 
               
                         </li> 
                         
                         <li>
                 
                             <input type="test"  placeholder="Confirmar contraseña" required /> 
               
                         </li> 
                         
                         <li>
                             
                            <input type="file" name="avatar" placeholder="Imagen Perfil"/>
                         </li>
                         
                         <li>
                             
                               <textarea name="descripcion" cols="40" rows="6" placeholder="Descripción"></textarea>  
                         </li>
                         
                            
                            <button class="submit" name='accion' value='registroJugador'>Confirmar</button> </li> </ul> </div> </form> </body> </html>

            
            
            
            
            
            
            
            
            
        
        
        <sidebar>WIDGET FACEBOOK</sidebar>
        </article>
        
        <footer>Copyright ©FemSport</footer>
    </body>
</html>