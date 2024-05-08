<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

include_once './PDO/Conexion.php';
include_once './PDO/Imagenes.php';

$database = new Conexion();
$db = $database->conectar();
$imagenes = new Imagenes();
$id_articulo = isset($_GET['id_articulo']) ? $_GET['id_articulo'] : die();
$imagenesAsociadas = $imagenes->obtenerPorArticulo($id_articulo);
$num = $stmt->rowCount();

if ($num > 0) {
    $imagenesArr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $singleImagen = array(
            "id" => $id,
            "id_articulo" => $id_articulo,
            "nombre_de_la_imagen" => $nombre_de_la_imagen,
            "extension" => $extension,
            "content" => base64_encode($content), // Convertimos el contenido BLOB a base64 para enviarlo como JSON
            "isActive" => $is_active,
            "createdBy" => $created_by,
            "createdOn" => $created_on,
            "updatedBy" => $updated_by,
            "updatedOn" => $updated_on
        );
        array_push($imagenesArr, $singleImagen);
    }
    http_response_code(200);

    echo json_encode($imagenesArr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "No se encontraron imágenes para el artículo con ID " . $id_articulo . ".")
    );
}
?>