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
         */


        header("HTTP/1.1 201");
        exit();
    }
    http_response_code(203);
    exit();
} catch (Error $error) {
    header("HTTP/1.1 203");
    exit();
}

http_response_code(403);
exit();