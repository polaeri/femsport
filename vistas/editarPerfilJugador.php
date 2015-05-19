<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>              
        <?php
        $sessio = new Session();
        $jugador = $sessio->getSession("jugador");
        $jugador->printEditarJugador();
        ?>
        
        <form action="index.php" method="POST">
            <button name="accion" value="cancelarEditarPerfilJugador">Cancelar</button>
            <button name="accion" value="GuardarEditarPerfilJugador">Guardar</button>
        </form>
    </body>
</html>