<?php
class ClassArticulos {
    private $id;
    private $titulo;
    private $descripcion;
    private $isActive;
    private $createdBy;
    private $createdOn;
    private $updatedBy;
    private $updatedOn;

    // Constructor
    public function __construct($titulo = '', $descripcion = '', $isActive = true, $createdBy = '', $createdOn = null, $updatedBy = '', $updatedOn = null) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->isActive = $isActive;
        $this->createdBy = $createdBy;
        $this->createdOn = $createdOn;
        $this->updatedBy = $updatedBy;
        $this->updatedOn = $updatedOn;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function getCreatedBy() {
        return $this->createdBy;
    }

    public function getCreatedOn() {
        return $this->createdOn;
    }

    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    // Setters
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    public function setCreatedOn($createdOn) {
        $this->createdOn = $createdOn;
    }

    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }

    public function setUpdatedOn($updatedOn) {
        $this->updatedOn = $updatedOn;
    }
}

?>
