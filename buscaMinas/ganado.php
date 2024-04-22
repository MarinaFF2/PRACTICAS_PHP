<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busca Minas</title> 
        <style>
            .h{
                text-align: center;
                width: 30px;
            }
        </style>
    </head>
    <body> 
        <?php
        require_once 'libreria.php';
        session_start();
        $v = $_SESSION['tablero'];
        ?>
        <form name="tablero" action="tablero.php" method="POST">     
            <?php
            echo 'Has ganado.<br>';
            for ($i = 0; $i < count($v); $i++) {
                ?>
                <input type="submit" class="h" name="<?php echo $i ?>" value="<?php echo signo($v, $i) ?>" disabled="true" readonly="true"> 
                <?php
            }
            ?>
                <br>
            <input type="submit" name="volver" value="Volver">
        </form> 
    </body>
</html>