<?php
require_once 'Conexion.php'; 

class Articulos {
    protected $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }



    public function insertar($titulo, $descripcion, $created_by) {
        try {
            $sql = "INSERT INTO articulos (titulo, descripcion, created_by) VALUES (:titulo, :descripcion, :created_by)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':created_by', $created_by);
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTodosActivos() {
        try {
            $sql = "SELECT * FROM articulos WHERE is_active = 1";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }       

    public function obtenerTodosInactivos() {
        try {
            $sql = "SELECT * FROM articulos WHERE is_active = 0";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>
