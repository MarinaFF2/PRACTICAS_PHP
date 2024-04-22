<?php

/**
 * OPCION 1
 */
//abirmos escritor
$fp = fopen('fichero.txt','w');
//escribimos
fwrite($fp, "hola");
fwrite($fp, "guapo");
//cerramos escritor
fclose($fp);


/**
 * OPCION 2
 */
file_put_contents('fichero1.txt', 'holiii guapiii');
