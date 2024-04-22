<?php
session_start();
function iniciarTableroVista($t) { //tablero que se muestra
    for ($i = 0; $i < $t; $i++) {
        $v[$i] = '-';
    }
    return $v;
}

function iniciarTablero($t, $m) { //tablero solucion
    for ($i = 0; $i < $t; $i++) {
        $v[$i] = 0;
    }
    ponerMinas($v, $m);
    ponerNumeros($v);

    return $v;
}

function ponerMinas(&$v, $m) {
    while ($m > 0) {
        $pos = rand(0, count($v) - 1);
        if ($v[$pos] == 0) {
            $v[$pos] = 99; //poniendo la bomba
            $m = $m - 1;
        }
    }
}

function ponerNumeros(&$v) {
    for ($i = 0; $i < count($v); $i++) {
        if ($v[$i] == 99) { //para comprobar si delante de la posicion hay mina
            if ($i - 1 >= 0) {
                if ($v[$i - 1] != 99) {
                    $v[$i - 1] ++;
                }
            }
            if ($i + 1 < count($v)) {
                if ($v[$i + 1] != 99) {
                    $v[$i + 1] ++;
                }
            }
        }
    }
}

function comprobarTM($t, $m) { //comprobamos que el tamaño y las minas son correctas
    $s = false;
    if ($t>0 && $m>0 && $t > $m) {
        $s = true;
    } else {
        header("Location: index.php");
    }
    return $s;
}

function mostrarPistas($v) {
    ?>
    <form name="tablero" action="tablero.php" method="POST">     
        <?php
        for ($i = 0; $i < count($v); $i++) {
            if ($v[$i] == 99) {
                ?>
                <input type="submit" class="h" name="h" value="<?php echo '*'; ?>" disabled="true" readonly="true"> 
                <?php
            } else {
                ?>
                <input type="submit" class="h" name="h" value="<?php echo $v[$i]; ?>" disabled="true" readonly="true"> 
                <?php
            }
        }
        ?>
        <br>
    </form>
    <?php
}

function mostrarTablero($v) {
    ?>
    <form name="tablero" action="tablero.php" method="POST"> 
        <?php
        for ($i = 0; $i < count($v); $i++) {
            ?>
            <input type="submit" class="h" name='boton' value="<?php echo $i; ?>"> 
            <?php
        }
        ?>
        <br>
        <input type="submit" name="volver" value="Volver">
        <input type="submit" name="rendirse" value="Rendirse"> 
    </form> 
    <?php
}

function comprobarTablero($ve, &$vis, $pos, $m) {
    $cont = $_SESSION['cont'];
    for ($i = 0; $i < count($ve); $i++) {
        if ($pos == $i) {
            $s = signo($ve, $pos);
            if ($ve[$pos] != 99) {
                $vis[$pos] = $s;
                $_SESSION['vista'] = $vis;
                $cont++;
            } else {
                $vis[$pos] = $s;
                $_SESSION['vista'] = $vis;
                header("Location: perdido.php");
            }
        }
    }
    $c = count($vis) - $m;
    if ($c == $cont) {
        header("Location: ganado.php");
    }
    $_SESSION['cont'] = $cont;
}

function signo($ve, $pos) {
    switch ($ve[$pos]) {
        case 0:
            $s = 0;
            break;
        case 1:
            $s = 1;
            break;
        case 2:
            $s = 2;
            break;
        case 99:
            $s = '*';
            break;
    }
    return $s;
}