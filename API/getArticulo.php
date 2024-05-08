<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require_once '../PDO/Conexion.php';
require_once '../PDO/Articulos.php';
require_once '../PDO/Imagenes.php';
require_once '../classes/Utils.php';

//instancias de clases
$imagenes = new Imagenes();
$articulo = new Articulos();
$utils = new Utils();

try {
    $listaArticulos = $articulo->obtenerTodosActivos();
    $articulosArr = array();

    //row es renglon
    foreach ($listaArticulos as $rowArticulo) {
        $imagenesPorId = $imagenes->getImagenesPorId($rowArticulo['id']);
        $singleArticulo = array(
            "id" => $rowArticulo['id'],
            "titulo" => $rowArticulo['titulo'],
            "descripcion" => $rowArticulo['descripcion'],
            "isActive" => $rowArticulo['is_active'],
            "createdBy" => $rowArticulo['created_by'],
            "createdOn" => $rowArticulo['created_on'],
            "updatedBy" => $rowArticulo['updated_by'],
            "updatedOn" => $rowArticulo['updated_on'],
            "imagenes" => $utils->formatImage($imagenesPorId)
        );
        array_push($articulosArr, $singleArticulo);
    }
    http_response_code(200);

    echo json_encode($articulosArr);
} catch (\Exception $e) {
    http_response_code(404);

    echo json_encode(
        array("message" => "No se encontraron artículos.")
    );
}
?>