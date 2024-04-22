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
        //pasado por referencia
        function manipularVector(&$a){
            $a[] =12000;
        }


        $v[0] = 10;
        $v[1] = 14;
        //te lo añade al final automaticamente
        $v[] = 20;
        $v[] = 30;
        //se puede mezclar en un vecctor distintos tipos
        $v['Daw2'] = 12.8;
        $v[135] = 'cadena';
        $v[] = true;
        manipularVector($v);
        
        //eliminar e 2º elemento, con el for no se puede ver
            unset($v[2]);
        //este ya no se utiliza
        for ($i=0;$i<count($v);$i++){
            echo $i.' --> '.$v[$i].'<br>';
        }
        echo '---------------'.'<br>';
        //este si se utliza, mira si hay algo en memoria y lo saca sin importar el indice
        foreach ($v as $key) {
            echo $key.'<br>';
        }
        $v['DAW2'] = 'otra cosa';
         echo '---------------'.'<br>';
        foreach ($v as $key => $value) {
            echo $key.' --> '.$value.'<br>';
        }
        echo $vec['DAW2'];
        
        echo '---------------'.'<br>';
        $v1 = array('DAW1' => 1, 'DAW2' => true, 'a', 'otra cosa');
        foreach ($v1 as $key => $value) {
            echo $key.' --> '.$value.'<br>';
        }
        echo '---------------'.'<br>';
        
        $v2 = [
            'DAW1' => 1,
            'DAW2' => true,
            -15 //no tiene clave, se añade al final cogiendo el indice correspodiente
        ];
        
        foreach ($v2 as $key => $value) {
            echo $key.' --> '.$value.'<br>';
            echo 'key ---> value'.'<br>';
        }
        echo '---------------'.'<br>';
        ?>
    </body>
</html>
