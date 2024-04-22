<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'Persona.php';
        require 'Tablero.php';
        $t = new Tablero(10,3);
        $t->generarPistas();
        
        $p = new Persona('DAW2',20);
        echo $p;
        echo $p->getNombre();
        echo Persona::$COMUN;
        ?>
    </body>
</html>
