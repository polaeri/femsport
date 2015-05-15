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
           
            <form class="contact_form" action="#" id="contact_form" runat="server"> 
                
                <div>
                    <ul> 
                        <li> 
                               <h2>Formulario Jugador</h2>
                            <span class="required_notification">* Datos requeridos</span> 
                        </li> 
                        
                        <li>
                 
                            <input type="text" value="" placeholder="Nombre" required /> 
               
                         </li> 
                         
                         <li>
                 
                             <input type="text" value="" placeholder="Apellidos" required /> 
               
                         </li> 
                  
                         <li>
                 
                            <input type="DNI" placeholder="DNI/NIF" required /> 
               
                         </li> 
                         
                         <li>
                 
                            <input type="tel" placeholder="Telefono" required /> 
               
                         </li> 
                     
                                         
                         <li> 
                            <input type="email" name="email"   placeholder="Correo electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /> 
                            <span class="form_hint" >Formato correcto: "nombre@dominio.com"</span> 
                         </li> 
                        
                        <li>
                 
                             <input type="text" value="" placeholder="Nombre Usuario" required /> 
               
                         </li> 
                         
                         <li>
                 
                             <input type="password" value="" placeholder="Contraseña" required /> 
               
                         </li> 
                         
                         <li>
                 
                             <input type="test" value="" placeholder="Contraseña" required /> 
               
                         </li> 
                         
                         <li>
                             
                            <input type="file" name="Imgaen" placeholder="Imagen Perfil"/>
                         </li>
                         
                         <li>
                             
                               <textarea name="Descripcion" cols="40" rows="6" placeholder="Descripción"></textarea>  
                         </li>
                         
                            
                            <button class="submit" type="submit">Enviar mensaje</button> </li> </ul> </div> </form> </body> </html>

<sidebar>WIDGET FACEBOOK</sidebar>
</article>

<footer>Copyright ©FemSport</footer>
</body>
</html>
