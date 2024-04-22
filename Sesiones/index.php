<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start(); //ponerlo siempre al empezar

        if (isset($_REQUEST['cerrar'])) {
            session_destroy(); //para destruir la sesion
            
            //obligatorio para crear otra sesion
            session_start();
            session_regenerate_id();
        }
        echo session_id();//identificador unico de la sesion
        $_SESSION['valor'] = 27;//para meter un valor en la sesion
        
        header('Location: otra.php');//para redirigir
        
        ?>
        <form name="cerrar" action="otra.php">
            <input type="submit" name="otra" value="otro">
        </form>
    </body>
</html>
