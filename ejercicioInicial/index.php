<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>home</title>
    </head>
    <body>
        <?php
        //para comprobar si esta estableciada, es decir, si existe
        if(!isset($edad)){
            echo 'varible no definida'.'<br>';
        }
        
        //para declarar la variable, se pone siempre
        $edad= 135;
        
        //elimina la variable de la aplicacion
        unset($edad);
        
        if(isset($edad)){
            echo 'varible definida'.'<br>';
        }
       //para imprimir
        print 'hola ';
        echo 'la edad de la variable es: '.$edad.' años';  
        
        if($edad >0){
            echo 'es mayor';
        }else{
            ?>
        <input type="text" name="caja" value="">
        <?php
        }
        $edad = 'Cadena';
        echo $edad;
        ?>
        <?php
        //todo se pasa por defecto por valor
        //se pasa por referencia si pones &$v1, es decir &$
        function loquesea($v1,$v2){
            $v1=27;
            $v2=100;
            $total=$v1+$v2;
            return $total;
        }
        $a=10;
        $b=8;
        echo loquesea($a,$b).'<br>';
        echo $a;
        ?>
        <form name="ejemplo" action="valida.php" method="POST">
            <input type="text" name="caja" value="">
            <input type="number" name="numero" value="">
            <input type="submit" name="aceptar" value="Aceptar">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>
    </body>
</html>
