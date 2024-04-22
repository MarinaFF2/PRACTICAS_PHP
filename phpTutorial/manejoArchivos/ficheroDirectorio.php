<?php

//si el fichero existe
if(file_exists('fichero.txt')){ //rutas completas
    echo 'Es un fichero';
}else{
    echo 'No es un fichero';
}

//si el directorio existe
if(is_dir('/holi/')){ //rutas completas
    echo 'Es un directorio';
}else{
    echo 'No es un directorio';
}