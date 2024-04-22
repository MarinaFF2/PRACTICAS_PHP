<?php
$nombre = $_REQUEST['nombre'];
print_r($_FILES);

//mover el fichero al destino donde lo queremos poner
$filename = $_FILES['fichero']["tmp_name"]; //nombre del fichero
$destination = "/ficheros/".$_FILES['fichero']["name"]; //Destino del fichero
move_uploaded_file($filename, $destination);