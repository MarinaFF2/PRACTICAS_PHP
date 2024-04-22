<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Animales</title>
    </head>
    <body>
        <h1>Juego del zoo</h1>
        <?php
        require_once 'clase/Simulacion.php';
        $i = 1;
        $s = new Simulacion();
        $pa = $s->crearParque();
        $ve = $pa->getV();
        //$_SESSION['vector'] = $ve;
        while ($i < 80) {
            //$ve = $_SESSION['vector'];
            $animal = $s->elegirAnimal($pa, $ve);
            if ($animal != null) {
                //cada 2seg los animales hacen acciones habituales al azar
                //comer, dormir, o hacer ruiso
                $w = $s->accionHabitual($animal);
                echo $w;
        echo '<br>';
            }
            //cada 10seg aparece un animal en posicion libre, sino se va
            $w = $s->aparecePosicion($pa, $ve);
            echo $w;
            $ve=$pa->getV();
            print_r($ve);
        echo '<br>';
        echo '<br>';
            ob_flush();
            flush();
            $animal2 = $s->elegirAnimal($pa, $ve);
            if ($animal2 != null) {
                //cada 15seg animal cambia de posicion a otra adyacente, sino hay hueco no se mueve
                $w = $s->cambiaPosicion($animal2, $pa, $ve);
                echo $w;
        echo '<br>';
                $pa->setV($ve);
                print_r($ve);
        echo '<br>';
        echo '<br>';
                ob_flush();
                flush();
            }
            $animal1 = $s->elegirAnimal($pa, $ve);
            if ($animal1 != null) {
                //cada 20seg animal abandona el parque 50%
                $w = $s->abandonaParque($animal1, $ve);
                echo $w;
        echo '<br>';
                $pa->setV($ve);
                ob_flush();
                flush();
            }
            sleep(1);
            $i++;
        }
        ?>
    </body>
</html>