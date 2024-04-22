<?php

require_once 'Ranking.php';
require_once 'Constantes.php';
require_once 'Usuario.php';

/**
 * Description of Constantes
 *
 * @author Marina Flores Fernandez
 */
class Conexion {

    private static $conexion;

    static function abrirBD() {
        /* Abrir la conexión */
        self::$conexion = mysqli_connect('localhost', Constantes::$usuario, Constantes::$password, Constantes::$BBDD);
    }

    static function cerrarBD() {
        /* Cerrar la conexión */
        mysqli_close(self::$conexion);
    }

    /**
     * CLASE USUARIOS
     */

    /**
     * Metodo para obtener un usuario para comprobar que exite
     * con el correo y contraseña para el incio de sesion
     * @return \Usuario
     */
    static function existeUsuario($correo, $pwd) {
        self::abrirBD();

//        //preparar
//        $consulta = "SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where usuario.correo='" . $correo . "' and usuario.pwd='" . $pwd . "' and asignarRol.usuario=usuario.correo";
//
//        if ($resultado = mysqli_query(self::$conexion, $consulta)) {
//            while ($fila = mysqli_fetch_array($resultado)) {
//                $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
//            }
//            //var_dump($resultado);
//            mysqli_free_result($resultado);
//        }

        $sentencia = 'SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where usuario.correo=? and usuario.pwd=? and asignarRol.usuario=usuario.correo';
        $stmt = mysqli_stmt_init(self::$conexion);
        mysqli_stmt_prepare($stmt, $sentencia);
        mysqli_stmt_bind_param($stmt, 'ss', $correo, $pwd);
        $u = null;
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            $fila = mysqli_fetch_array($resultado);
            if (!empty($fila)) {
                $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
            }
        }
        mysqli_stmt_close($stmt);

        self::cerrarBD();
        return $u;
    }

    /**
     * Metodo para obtener un usuario para comprobar que exite
     * solo con el correo
     * @return \Usuario
     */
    static function existeUsu($correo) {
        self::abrirBD();

        $sentencia = 'SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where usuario.correo=? and asignarRol.usuario=usuario.correo';
        $stmt = mysqli_stmt_init(self::$conexion);
        mysqli_stmt_prepare($stmt, $sentencia);
        mysqli_stmt_bind_param($stmt, 's', $correo);
        $u = null;
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            $fila = mysqli_stmt_fetch($resultado);
            if (!empty($fila)) {
                $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
            }
        }
        mysqli_stmt_close($stmt);

        self::cerrarBD();
        return $u;
    }

    /**
     * Metodo para obtener una lista de array con la clase usuario
     * @return \Usuario
     */
    static function obtenerUsuarios() {
        self::abrirBD();

        if ($resultado = mysqli_query(self::$conexion, 'SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where asignarRol.usuario=usuario.correo')) {
            while ($fila = mysqli_fetch_row($resultado)) {
                $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
                $v[] = $u;
            }
        }
        mysqli_stmt_free_result($resultado);

        self::cerrarBD();

        return $v;
    }

    /**
     * METODO INSERTAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function insertarUsuarios($correo, $pwd, $nombre, $apellido) {
        self::abrirBD();

//        $query = "INSERT INTO usuario (correo, clave, nombre, apellido) VALUES ('" . $correo . "','" . $pwd . "','" . $nombre. "','" .$apellido . "')"; 
//        echo $query;
//        if (mysqli_query(self::$conexion, $query)) {
//            echo 'Registro insertado con éxito' . '<br/>';
//        } else {
//            echo "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
//        }

        $stmt = mysqli_prepare(self::$conexion, 'INSERT INTO usuario (correo, pwd, nombre, apellido) VALUES (?,?,?,?)');
        mysqli_stmt_bind_param($stmt, "ssss", $correo, $pwd, $nombre, $apellido);
        mysqli_stmt_execute($stmt);

//        mysqli_stmt_free_result($stmt);

        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function ModificarUsuarios($correo, $nombre, $apellido) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'UPDATE usuario SET nombre=?, apellido=? where correo=?');
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $apellido, $correo);
        mysqli_stmt_execute($stmt);
//        mysqli_stmt_free_result($stmt);

        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function ModificarUsuContra($correo, $pwd) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'UPDATE usuario SET pwd=? where correo=?');
        mysqli_stmt_bind_param($stmt, "ss", $pwd, $correo);
        mysqli_stmt_execute($stmt);
//        mysqli_stmt_free_result($stmt);

        self::cerrarBD();
    }

    /**
     * BORRAR USUARIO   
     * @param type $correo
     */
    static function borrarUsuario($correo) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'DELETE FROM usuario WHERE correo=?');
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
//        mysqli_stmt_free_result($stmt);

        self::cerrarBD();
    }

    /**
     * CLASE ROL
     */

    /**
     * METODO INSERTAR ROL
     * @param type $correo
     * @param type $rol
     */
    static function insertarRol($correo, $rol) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'INSERT INTO asignarRol (idAsignarRol, usuario, idRol) VALUES (0,?,?)');
        mysqli_stmt_bind_param($stmt, "si", $correo, $rol);
        mysqli_stmt_execute($stmt);

        self::cerrarBD();
    }

    /**
     * Metodo modificar rol
     * @param type $idAsignarRol
     * @param type $rol
     * @param type $correo
     */
    static function ModificarRol($rol, $correo) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'UPDATE asignarRol SET idRol=? WHERE usuario=?');
        mysqli_stmt_bind_param($stmt, "is", $rol, $correo);
        mysqli_stmt_execute($stmt);

        self::cerrarBD();
    }

    /**
     * BORRAR ROL
     * @param type $correo
     */
    static function borrarRol($correo) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'DELETE FROM asignarRol WHERE usuario = ?');
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
//        mysqli_stmt_free_result($stmt);

        self::cerrarBD();
    }

    /**
     * CLASE RANKING
     */

    /**
     * METODO INSERTAR CALIFICACIONES
     * @param type $correo
     * @param type $ganadas
     * @param type $perdidas
     */
    static function insertarRanking($correo, $ganadas, $perdidas) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'INSERT INTO ranking (idRanking,ganadas,perdidas,usuario) VALUES (0,?,?,?)');
        mysqli_stmt_bind_param($stmt, "iis", $ganadas, $perdidas, $correo);
        mysqli_stmt_execute($stmt);

        self::cerrarBD();
    }

    /**
     * Metodo para obtener una lista de array con la clase ranking
     * @return \Ranking
     */
    static function obtenerRanking() {
        self::abrirBD();

        if ($resultado = mysqli_query(self::$conexion, 'SELECT * FROM ranking ORDER BY ganadas desc, perdidas desc')) {
            while ($fila = mysqli_fetch_row($resultado)) {
                $r = new Ranking($fila[0], $fila[1], $fila[2], $fila[3]);
                $v[] = $r;
            }
        }
        mysqli_free_result($resultado);

        self::cerrarBD();

        return $v;
    }

    /**
     * Metodo para obtener un ranking de la clase ranking
     * @return \Ranking
     */
    static function obtenerRankingUsu($correo) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'SELECT * FROM ranking WHERE usuario=?');
        mysqli_stmt_bind_param($stmt, 's', $correo);
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            $fila = mysqli_stmt_fetch($resultado);
            $r = new Ranking($fila[0], $fila[1], $fila[2], $fila[3]);
        }

        mysqli_free_result($resultado);

        self::cerrarBD();

        return $r;
    }

    /**
     * METODO partida perdida
     * @param type $correo
     */
    static function partidaPerdida($correo) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'UPDATE ranking SET perdidas=perdidas+1 WHERE usuario=?');

        mysqli_stmt_bind_param($stmt, "s", $v1);
        $v1 = $correo;
        mysqli_stmt_execute($stmt);

        self::cerrarBD();
    }

    /**
     * METODO Añadir partida ganada
     * @param type $correo
     */
    static function partidaGanada($correo) {
        self::abrirBD();

        $sql = "UPDATE ranking SET ganadas=ganadas+1 WHERE usuario='" . $correo . "'";
        mysqli_query(self::$conexion, $sql);
//        $stmt = mysqli_prepare(self::$conexion, 'UPDATE ranking SET ganadas=ganadas+1 WHERE usuario=?');
//        
//        mysqli_stmt_bind_param($stmt, "s", $v1);
//        $v1 =$correo;
//        mysqli_stmt_execute($stmt);

        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR CALIFICACIONES
     * @param type $correo
     * @param type $ganadas
     * @param type $perdidas
     */
    static function ModificarRanking($correo, $ganadas, $perdidas) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'UPDATE ranking SET ganadas=?,perdidas=? WHERE correo=?');
        mysqli_stmt_bind_param($stmt, "iis", $ganadas, $perdidas, $correo);
        mysqli_stmt_execute($stmt);

        self::cerrarBD();
    }

    /**
     * BORRAR RANKING  
     * @param type $correo
     */
    static function borrarRanking($correo) {
        self::abrirBD();

        $stmt = mysqli_prepare(self::$conexion, 'DELETE FROM ranking WHERE usuario = ?');
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
//        mysqli_stmt_free_result($stmt);

        self::cerrarBD();
    }

}
