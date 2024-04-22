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
        if (isset($_SESSION['t'])) {
            $t = $_SESSION['t'];
            $m = $_SESSION['m'];
            $ve = $_SESSION['tablero'];
            $vis = $_SESSION['vista'];
        }
        //cuando vienes del index
        if (isset($_REQUEST['jugar'])) {
            $t = $_REQUEST['t'];
            $m = $_REQUEST['m'];
            $s = comprobarTM($t, $m);
            if ($s) {
                $vis = iniciarTableroVista($t); //vector que se va a ver
                $ve = iniciarTablero($t, $m); //vector donde esta la solucion
                $_SESSION['tablero'] = $ve;
                $_SESSION['vista'] = $vis;
                $_SESSION['t'] = $t;
                $_SESSION['m'] = $m;
                $_SESSION['cont'] = 0;
                mostrarTablero($vis);
                print_r($ve);
            }
        }

        if ($_REQUEST['volver'] === 'Volver') {
            session_destroy();
            header("Location: index.php");
        }

        if ($_REQUEST['rendirse'] === 'Rendirse') {
            $ve = $_SESSION['tablero'];
            $vis = $_SESSION['vista'];
            header("Location: rendirse.php");
        }

        if (isset($_REQUEST['boton'])) {
            $pos = $_REQUEST['boton'];
            comprobarTablero($ve, $vis, $pos, $m);
            $_SESSION['vista'] = $vis;
            mostrarPistas($vis, $pos);
            mostrarTablero($vis);
        }
        ?>
    </body>
</html>