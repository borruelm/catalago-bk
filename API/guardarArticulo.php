<?php

header('Access-Control-Allow-Origin *');
header('Content-Type: application/ Json ; charset=utf-8');

include_once '../PDO/Articulos.php';
include_once '../PDO/Imagenes.php';


$articulos = new Articulos();
$imagenes = new Imagenes();

$data = json_decode(file_get_contents("php://input"));

try {
    if ($data->METHOD == 'POST') {
        $idArticulo = $articulos->guardarArticulo($data->titulo, $data->descripcion, $data->is_active, $data->created_by, $data->created_on);
        //iterar arreglo
        foreach ($data->imagenes as $imagenesRow) {
            $imagenes->insertarImagen($idArticulo, $imagenesRow->content, $imagenesRow->nombre_de_la_imagen,$imagenesRow->extencion, $imagenesRow->created_by);
        }
    
        http_response_code(200);
        exit();
    }
    http_response_code(400);
    exit();

} catch (Error $error) {
    // petision erronea
    http_response_code(403);
    exit();
}

