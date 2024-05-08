<?php

class Conexion {
    private static $host = 'localhost';
    private static $dbname = 'catalogfun';
    private static $user = 'miguel';
    private static $password = 'zV/dWQCwf[yRHyCc';
    private static $conexion = null;

    public static function conectar() {
        if (!isset(self::$conexion)) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("set names utf8");
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage();
                die();
            }
        }
        return self::$conexion;
    }

    public static function cerrar() {
        self::$conexion = null;
    }
}

?>
