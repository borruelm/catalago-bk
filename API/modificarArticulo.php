<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

include_once '../PDO/Articulos.php';
include_once '../PDO/Imagenes.php';

// Suponiendo que tienes una instancia PDO creada y conectada
$pdo = new PDO('mysql:host=localhost;dbname=mi_basededatos', 'usuario', 'contraseña');

$articulo = new Articulos();
$imagenes = new Imagenes($pdo);

$data = json_decode(file_get_contents("php://input"));

try {
    if ($data->METHOD == "PUT") {
        $id_articulo = $data->id;

        // Actualizar el artículo
        $articulo->actualizarArticulo($id_articulo, $data->titulo, $data->descripcion, $data->is_active, $data->updated_by, $data->updated_on);

        // Actualizar imágenes
        foreach ($data->imagenes as $imagen) {
            if (isset($imagen->id)) {
                // Actualizar imagen existente
                $imagenes->actualizarImagen($imagen->id, $imagen->content, $imagen->nombre_de_la_imagen, $imagen->extencion, $imagen->updated_by, $imagen->updated_on);
            } else {
                // Insertar nueva imagen
                $imagenes->insertarImagen($id_articulo, $imagen->content, $imagen->nombre_de_la_imagen, $imagen->extencion, $imagen->updated_by);
            }
        }

        http_response_code(200);
        echo json_encode(["message" => "Artículo y sus imágenes actualizados exitosamente"]);
        exit();
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Método no permitido"]);
        exit();
    }
} catch (Exception $e) {
    http_response_code(403);
    echo json_encode(["message" => $e->getMessage()]);
    exit();
}
