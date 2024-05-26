<?php
header('Access-Control-Allow-Origin *');
header('Content-Type: application/ Json ; charset=utf-8');

include_once '../PDO/Articulos.php';
include_once '../PDO/Imagenes.php';

$articulos = new Articulos();
$imagenes = new Imagenes();

$data = json_decode(file_get_contents("php://input"));

try {
    if ($data->METHOD == "PUT") {
        // Actualizar el artículo
        $articulos->actualizarArticulo(
            $data->id,
            $data->titulo,
            $data->descripcion,
            $data->is_active,
            $data->updated_by
        );

        // Actualizar imágenes
        foreach ($data->imagenes as $imagen) {
            if (isset($imagen->id)) {
                // Actualizar imagen existente
                $imagenes->actualizarImagen(
                    $imagen->id,
                    $imagen->content,
                    $imagen->nombre_de_la_imagen,
                    $imagen->extension,
                    $imagen->is_active,
                    $imagen->updated_by,
                );
            } else {
                // Insertar nueva imagen
                $imagenes->insertarImagen(
                    $data->id,
                    $imagen->content,
                    $imagen->nombre_de_la_imagen,
                    $imagen->extension,
                    $imagen->created_by
                );
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
