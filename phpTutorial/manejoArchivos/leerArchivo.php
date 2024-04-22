<?php

//leer ficheros

/**
 * OPCION 1 lee caracter a caracter
 */
//Abrimos lector
$file = fopen('fichero.txt', 'r'); //ruta completa, accion
//print_r($file);

while(!feof($file)){
        echo fgetc($file);
}
fclose($file);//cerramos lector

/**
 * OPCION 2 LEE EL FICHERO DE GOLPE
 */

//Abrimos lector
$file1 = file_get_contents('fichero.txt'); //ruta completa
print_r($file1);


/**
 * OPCION 3 LEE LINEA A LINEA
 */
//Abrimos lector
$lineas = file('fichero.txt'); //ruta completa

print_r($lineas);
die("Hemos parado la ejecucion"); //para la ejecucion de un script
foreach ($lineas as $num_linea => $linea) {
    echo 'liena 1: '.$num_linea.':'.$linea;
}


