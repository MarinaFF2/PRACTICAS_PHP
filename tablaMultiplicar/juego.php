<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>juego</title>
        <style>
            p{
                margin:0px;
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <?php
            $n = $_REQUEST['n1'];
        ?>
        <form name="form1" action="validar.php" method="POST">
            La tabla de multiplicar del <input type="text" name="n1" value="<?php echo $n?>" readonly="true"><br>
        <?php
            for ($i = 0; $i <= 10; $i++) {
                echo $n.' x '.$i.' = ';
        ?>
            <input type="text" name="n[]" value=""><br>
        <?php
            }
            ?>
            <input type="submit" name="comprobar" value="Comprobar">
        </form>
        
    </body>
</html>
