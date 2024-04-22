<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_REQUEST['nombre'])){
            $nom = $_REQUEST['nombre'];
        }
        if(isset($_REQUEST['ape'])){
            $ape = $_REQUEST['ape'];
        }
        if(isset($_REQUEST['edad'])){
            $eda = $_REQUEST['edad'];
        }
        if(isset($_REQUEST['sexo'])){
            $sex = $_REQUEST['sexo'];
        }
        if(isset($_REQUEST['ciclo'])){
            $ciclo = $_REQUEST['ciclo'];
        }
        if(isset($_REQUEST['opciones'])){
            $opc = $_REQUEST['opciones'];
        }
        
        
        echo 'Nombre: ' . $nom . '<br>'
        . 'Apellido: ' . $ape . '<br>'
        . 'Edad: ' . $eda . '<br>'
        . 'Sexo: ' . $sex . '<br>'
        . 'Ciclo: ' . $ciclo . '<br>'
        . 'Opciones: <br>';
        foreach ($opc as $value) {
            echo $value.'<br>';
        }
        ?>
    </body>
</html>
