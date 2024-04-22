<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="form1" action="validar.php" method="POST">
            <?php
            $n = $_REQUEST['n1'];
            $result = $_REQUEST['n'];
            for ($j = 0; $j <= 10; $j++) {
                echo $n . ' x ' . $j . ' = ';
                if ($n * $j == $result[$j]) {
                    ?>
                    <input type="text" name="n[]" style="background-color:green" value="<?php echo $result[$j]?>"><br>
                    <?php
                } else {
                    ?>
                    <input type="text" name="n[]" style="background-color:red" value="<?php echo $result[$j]?>"><br>
                    <?php
                }
            }
            ?>
        </form>
    </body>
</html>
