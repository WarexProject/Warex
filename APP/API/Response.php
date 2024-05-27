<?php

class Response
{
    public static function result($code, $response){
        // Función auxiliar para convertir a UTF-8
        function convertToUTF8(&$item) {
            if (is_string($item)) {
                $item = mb_convert_encoding($item, 'UTF-8', 'auto');
            }
        }

        // Convertir la respuesta a UTF-8 si no lo está
        array_walk_recursive($response, 'convertToUTF8');

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        http_response_code($code);
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
}

?>
