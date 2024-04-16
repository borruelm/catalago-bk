<?php
include_once './classes/Imagenes.php';

$imgClass = new Imagenes();

/**
 * Calling Imagenes Insert
 */
try {
    $imgClass->insertar(1, 'HEX value', 'Ejemplo.jpg', 'jpg', 'batch');
} catch (Error $error) {
    echo 'Error on : ' . $error;
}