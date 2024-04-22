<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        //si ya está incluidad en tora pagina no la vuelve a incluir, sino la encuentra peta
            //require 'libreria.php';
        //se incluye solo una vez, sino la encuentra peta
            require_once 'libreria.php';
        // con esto no peta si no la encuentra
            //include 'libreria.php';
        //si ya está incluidad en tora pagina no la vuelve a incluir
            //include_once 'libreria.php';
        
        $n1 = $_REQUEST['n1'];
        $n2 = $_REQUEST['n2'];
        
        if (isset($_REQUEST['sum'])) {
            $total = sum($n1,$n2);
            echo $n1 . ' + ' . $n2 . ' = ' . $total;
        } else if (isset($_REQUEST['res'])) {
            $total = res($n1,$n2);
            echo $n1 . ' - ' . $n2 . ' = ' . $total;
        } else if (isset($_REQUEST['mult'])) {
            $total = mult($n1,$n2);
            echo $n1 . ' * ' . $n2 . ' = ' . $total;
        } else if (isset($_REQUEST['div'])) {
            if ($n2 == 0) {
                echo 'El divisor no puede ser 0';
            } else {
                $total = div($n1,$n2);;
                echo $n1 . ' / ' . $n2 . ' = ' . $total;
            }
        }
        ?>
    </body>
</html>
