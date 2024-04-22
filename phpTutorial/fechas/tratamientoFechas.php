<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        $f = "09/10/2018";
        //formateamos la fecha al estilo americano
        $fecha = date("Y-m-d", strtotime($f));
        echo $fecha . "\n";
        //primer dia del mes
        echo date("Y-m-01") . "\n";
        //
        echo date("Y-m-t") . "\n";
        //devuelve un array
        print_r(getdate()) . "\n";
        print_r(getdate(time())) . "\n";
        //la hora
        echo time() . "\n";

        print_r(localtime(time())) . "\n";

        //reSTAR O SUMAR FECHAS
        $f1 = "2018-10-09";
        //tinene que estar en formato americano
        $F_FUTURO = strtotime("+30 day", strtotime($f1));
        $F_FUTURO = strtotime("-3 month", strtotime($f1));
        echo date("d/m/Y", $F_FUTURO) . "\n";
        echo $F_FUTURO . "\n";
        
        date("d/m/Y H:i:s"). "\n";
        
        ?>
    </body>
</html>
