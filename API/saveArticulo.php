<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

/**
 * importa tus clases aqui
 */

$data = json_decode(file_get_contents("php://input"));


try {
    if ($data->METHOD == 'POST') {

        /***
         * llama tus metodos aqui
         * $data tiene los valores del contrato
         */


        // 201 significa creado exitosamente
        header("HTTP/1.1 201");
        exit();
    }
    // 203 error de formato
    http_response_code(203);
    exit();
} catch (Error $error) {
    // petision erronea
    header("HTTP/1.1 403");
    exit();
}
