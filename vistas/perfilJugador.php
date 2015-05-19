<html>
    <head>
        <title>FemSport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <ul>
            <?php
            $sessio = new Session();
            $jugador = $sessio->getSession("jugador");
            $jugador->printPerfilJugador();
            ?>
        </ul>
        <form action="index.php" method="POST">
            <button name="accion" value="editarPerfilJugador">Editar</button>
        </form>
    </body>
</html>
