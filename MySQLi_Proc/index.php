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
$conexion = mysqli_connect('localhost', Constantes::$usuario, Constantes::$password, Constantes::$BBDD);
        // Utilizando la forma procedimental.
        $conexion = mysqli_connect('localhost', 'fernando', 'Chubaca2018', 'ejemplo');
        print "Conexión realizada de forma procedimental: " . mysqli_get_server_info($conexion) . "<br/>";

        if (mysqli_connect_errno($conexion)) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        }

        $consulta = "SELECT * FROM personas";
        

        if ($resultado = mysqli_query($conexion, $consulta)) {

            /* obtener array asociativo */
//            while ($fila = mysqli_fetch_assoc($resultado)) {
//                print  $fila["DNI"].",". $fila["Nombre"].",".$fila["Tfno"]."<br/>";
//            }

            /* obtener el array por índices */
//            while ($fila = mysqli_fetch_row($resultado)) {
//                print  $fila[0].",". $fila[1].",".$fila[2]."<br/>";
//            }

            /* obtener ambos */
            while ($fila = mysqli_fetch_array($resultado)) {
                print $fila["DNI"] . "," . $fila[1] . "," . $fila[2] . "<br/>";
            }

            /* liberar el conjunto de resultados */
            mysqli_free_result($resultado);
        }

        
        //************* Insertar ************************
        /* Sentencias de preparación de la inserción y de la inserción propiamente. 
           Con esta forma se evitará la inyección de SQL.         */
//        $query = "INSERT INTO personas (DNI, Nombre, Tfno) VALUES (?,?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
//        $stmt = mysqli_prepare($conexion, $query);
//
//
        //    $stmt->bindParam(0, $correo);
        //    $stmt->bindParam(1, $pwd);
//        mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);
//
//        $val1 = '101A';
//        $val2 = 'Un nombre';
//        $val3 = '32344';
//
//        /* Ejecución de la sentencia. */
//        mysqli_stmt_execute($stmt);
//
//        $val1 = '101B';
//        $val2 = 'Otro';
//        $val3 = '999999';
//
//        /* Ejecución de la sentencia. */
//        mysqli_stmt_execute($stmt);

        $dn = '1E';
        $no = 'eproe';
        $tfno = '243';
        //$query = "INSERT INTO personas (DNI, Nombre, Tfno) VALUES ('".$dn."'"."'".$no."'"."'".$tfno."')"; //Estos parametros seran sustituidos mas adelante por valores.
        $query = "INSERT INTO personas (DNI, Nombre, Tfno) VALUES ('" . $dn . "','" . $no . "','" . $tfno . "')"; //Estos parametros seran sustituidos mas adelante por valores.
        echo $query;
        if (mysqli_query($conexion, $query)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error($conexion) . '<br/>';
        }
        
        
        //Con Update y con Delete es exactamente igual. 
        //También se puede usar:
        $query = "DELETE FROM personas WHERE DNI = '23R'";
        if (mysqli_query($conexion, $query)) {
            echo "Registro borrado Ok";
        } else {
            echo "Error al borrar: " . mysqli_error($conexion);
        }

        /* Cerrar la conexión */
        mysqli_close($conexion);
        unset($conexion);
        print "Conexión 2 cerrada" . "<br />";
        ?>
    </body>
</html>
