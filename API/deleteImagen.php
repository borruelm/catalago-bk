<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
/**
 * importa tus clases aqui
 */
require_once '../PDO/Imagenes.php';
// require_once '../PDO/Conexion.php';

$imagenes = new Imagenes();

$data = json_decode(file_get_contents("php://input"));// esto mapea el body del json
//body son valores adicionales que se mandan a una direccion url 

try {
    if ($data->METHOD == 'DELETE') {
        $imagenes->deleteImagenPorId($data->idImagen);

        // 200 significa ok
        http_response_code(200);
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