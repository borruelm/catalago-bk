<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
/**
 * importa tus clases aqui
 */
require_once '../PDO/Imagenes.php';
// require_once '../PDO/Conexion.php';


$imagenes = new Imagenes();

$data = json_decode(file_get_contents("php://input"));


try {
    if ($data->METHOD == 'POST') {
        $imagenes->activateImagenPorId($data->idImagen);

        // 201 significa borrado exitosamente
        http_response_code(202);
        exit();
    }
    // 203 error de formato
    http_response_code(203);
    exit();

} catch (Error $error) {
    // petision erronea
    http_response_code(403);
    exit();
}
