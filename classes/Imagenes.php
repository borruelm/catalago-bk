<?php

class Imagenes {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insertar($id_articulo, $content, $nombre_de_la_imagen, $extension, $created_by) {
        try {
            $sql = "INSERT INTO imagenes (id_articulo, contenido_hexadecimal, nombre_de_la_imagen, extension, created_by) VALUES (:id_articulo, :contenido_hexadecimal, :nombre_de_la_imagen, :extension, :created_by)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_articulo', $id_articulo);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':nombre_de_la_imagen', $nombre_de_la_imagen);
            $stmt->bindParam(':extension', $extension);
            $stmt->bindParam(':created_by', $created_by);
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            // Manejo del error
            die($e->getMessage());
        }
    }

    public function obtenerPorArticulo($id_articulo) {
        try {
            $sql = "SELECT * FROM imagenes WHERE id_articulo = :id_articulo AND is_active = 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_articulo', $id_articulo);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo del error
            die($e->getMessage());
        }
    }

    // Aquí podrías agregar más métodos como actualizar, eliminar, etc.
}

?>