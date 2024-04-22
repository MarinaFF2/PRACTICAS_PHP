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
        <form name="form1" action="juego.php" method="POST">
            La tabla de multiplicar del <input type="text" name="n1" value="<?php echo $n?>" readonly="true"><br>
        <?php
            for ($i = 0; $i <= 10; $i++) {
                echo $n.' x '.$i.' = ';
                if($_REQUEST['n']==null){
        ?>
            <input type="text" name="n[]" value=""><br>
        <?php   
                }else{
                    $result = $_REQUEST['n'];
                    if ($n * $i == $result[$i]) {
                    ?>
                    <input type="text" name="n[]" style="background-color:green" value="<?php echo $result[$i]?>"><br>
                    <?php
                } else {
                    ?>
                    <input type="text" name="n[]" style="background-color:red" value="<?php echo $result[$i]?>"><br>
                    <?php
                }
                }
            }
            ?>
            <input type="submit" name="comprobar" value="Comprobar">
        </form>
        
    </body>
</html>
