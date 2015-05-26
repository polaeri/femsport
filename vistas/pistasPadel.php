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
            if ($pista->getTipo() === 'padel') {
                echo $pista->printPista();
            }
        }
        ?>
    </body>
</html>