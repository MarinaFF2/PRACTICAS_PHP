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
        //no es un vector a no ser que pongas unos corchetes en el name, ej. name='caja[]'
        $v = $_REQUEST['caja'];
        //muestra el vector por defecto
        print_r($v);
        echo '<br>';
        foreach ($vec as $dato) {
            echo $dato.'<br>';
        }
        ?>
    </body>
</html>
