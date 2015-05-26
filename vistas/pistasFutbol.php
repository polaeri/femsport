<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>              
        <?php
        $sessio = new Session();
        $club = $sessio->getSession("club");
        for ($i = 0; $i < sizeof($club->getPistas()); $i++) {
            $pista = $club->getPista($i);
            if ($pista->getTipo() === 'futbol_11' || $pista->getTipo() === 'futbol_7' || $pista->getTipo() === 'futbol_5') {
                echo $pista->printPista();
            }
        }
        ?>
    </body>
</html>