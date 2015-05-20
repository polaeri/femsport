<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="jquery-2.1.3.js" type="text/javascript"></script>
    </head>
    <body>              
        <form action="index.php" method="POST">
            <?php
            $sessio = new Session();
            $jugador = $sessio->getSession("jugador");
            $jugador->printEditarJugador();
            ?>          
            <input type="button" value="Actualizar Contraseña" id="mostrar">
            <li><input type="password" placeholder="Contraseña actual" id="contrasenaVieja" name="contrasenaVieja" hidden/></li>
            <li><input type="password" placeholder="Nueva contraseña" id="contrasenaNueva" name="contrasenaNueva"  hidden /></li>
            <li><input type="password" placeholder="Confirmar nueva contraseña" id="contrasenaNueva2" name="contrasenaNueva2" hidden/></li>
            <br><br>
            <button name="accion" value="cancelarEditarPerfilJugador">Cancelar</button>
            <button name="accion" value="GuardarEditarPerfilJugador">Guardar</button> 
        </form>
        <script>
            $(document).ready(function () {
                $("#mostrar").click(function () {
                    $("#contrasenaVieja").show();
                    $("#contrasenaNueva").show();
                    $("#contrasenaNueva2").show();
                });
            });
        </script>

    </body>
</html>