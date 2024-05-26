<?php

class ClassImagenes {
    private $id;
    private $idArticulo;
    private $content;
    private $nombreDeLaImagen;
    private $extension;
    private $isActive;
    private $createdBy;
    private $createdOn;
    private $updatedBy;
    private $updatedOn;

    // Constructor
    public function __construct($idArticulo = 0, $content = '', $nombreDeLaImagen = '', $extension = '', $isActive = true, $createdBy = '', $createdOn = null, $updatedBy = '', $updatedOn = null) {
        $this->idArticulo = $idArticulo;
        $this->content = $content;
        $this->nombreDeLaImagen = $nombreDeLaImagen;
        $this->extension = $extension;
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

    public function getIdArticulo() {
        return $this->idArticulo;
    }

    public function getContent() {
        return $this->content;
    }

    public function getNombreDeLaImagen() {
        return $this->nombreDeLaImagen;
    }

    public function getExtension() {
        return $this->extension;
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
    public function setIdArticulo($idArticulo) {
        $this->idArticulo = $idArticulo;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setNombreDeLaImagen($nombreDeLaImagen) {
        $this->nombreDeLaImagen = $nombreDeLaImagen;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
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
