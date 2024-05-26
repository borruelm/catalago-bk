<?php
require_once 'Conexion.php';

class Articulos
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Conexion::conectar();
    }

    public function insertar($titulo, $descripcion, $created_by)
    {
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

    public function obtenerTodosActivos()
    {
        try {
            $sql = "SELECT * FROM articulos WHERE is_active = 1";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTodosInactivos()
    {
        try {
            $sql = "SELECT * FROM articulos WHERE is_active = 0";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function borrarArticuloPorId($id_articulo)
    {
        try {
            $sql = "UPDATE articulos SET is_active=0 WHERE id= :id_articulo ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array("id_articulo" => $id_articulo));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function guardarArticulo($titulo, $descripcion, $is_active, $created_by, $created_on)
    {

        try {
            $sql = "INSERT INTO articulos (titulo, descripcion, is_active, created_by, created_on) VALUES (:titulo, :descripcion, :is_active, :created_by, :created_on)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':is_active', $is_active);
            $stmt->bindParam(':created_by', $created_by);
            $stmt->bindParam(':created_on', $created_on);
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function actualizarArticulo($id, $titulo, $descripcion, $is_active, $updated_by, $updated_on)
    {
        try {
            $sql = "UPDATE articulos
        SET titulo = '$titulo', descripcion = '$descripcion', is_active = '$is_active', updated_by = '$updated_by', updated_on = '$updated_on'
        WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam('titulo', $titulo);
            $stmt->bindParam('descripcion', $descripcion);
            $stmt->bindParam('is_active', $is_active);
            $stmt->bindParam('updated_by', $updated_by);
            $stmt->bindParam('updated_on', $updated_on);
            stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
}
//Actualizar en articulo titulo, descripcion is active, updated by, updated on