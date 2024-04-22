<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //vale para hacer get y post
        $texto = $_REQUEST['caja'];
        $numero = $_REQUEST['numero'];
        echo $texto.' '.$numero.'<br>';
        if(isset($_REQUEST['aceptar'])){
            echo 'Has pulsado aceptar';
        }else{
            echo 'Has pulsado cancelar';
        }
        ?>
    </body>
</html>
