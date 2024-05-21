<?php
require_once 'Conexion.php';

class Imagenes
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Conexion::conectar();
    }

    public function getImagenesPorId($idArticulos)
    {
        try {
            $sql = "SELECT * from imagenes WHERE id_articulo = :id_articulo ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_articulo', $idArticulos);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function insertarImagen($id_articulo, $content, $nombre_de_la_imagen, $extension, $created_by)
    {
        try {
            $sql = "INSERT INTO imagenes (id_articulo, content, nombre_de_la_imagen, extension, is_active, created_by, created_on) VALUES (:id_articulo, :content, :nombre_de_la_imagen, :extension, 1, :created_by, now())";
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

    public function obtenerPorArticulo($id_articulo)
    {
        try {
            $sql = "SELECT * FROM imagenes WHERE id_articulo = :id_articulo";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_articulo', $id_articulo);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo del error
            die($e->getMessage());
        }
    }

    public function deleteImagenPorId($idImagen)
    { {
            try {
                $sql = "UPDATE imagenes SET is_active=0 WHERE id= :idImagen ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(array("idImagen" => $idImagen));
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

    }
}

