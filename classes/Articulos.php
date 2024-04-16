<?php

class Articulo {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
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
            // Manejo del error
            die($e->getMessage());
        }
    }

    public function obtenerTodos() {
        try {
            $sql = "SELECT * FROM articulos WHERE is_active = 1";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo del error
            die($e->getMessage());
        }
    }
}
?>