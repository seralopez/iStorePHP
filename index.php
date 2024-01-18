<?php

// --------------- FUNCIONES ----------------------------------------
function mensajeError($codigo, $mensaje, $solucion)
{
    $resul = array(
        "status" => $codigo,
        "message" => $mensaje,
        "solution" => $solucion
    );
    http_response_code($resul['status']);
    $json = json_encode($resul, JSON_UNESCAPED_UNICODE);
    echo ($json);
    exit();
}
// --------------- MANEJO ERRORES -----------------------------------
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', 'php_error_log.log');

// --------------- ZONA HORARIA -------------------------------------
date_default_timezone_set('America/Argentina/Buenos_Aires');

// --------------- MANEJO URI ---------------------------------------
$metodo = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$res = str_replace("/DW6/apirest", "", $uri);
$res = explode("/", $res);
$uri = array_filter($res);

// --------------- SIN PETICIONES -----------------------------------
if (empty($uri)) {
    // mensajeError(404, "No se puede hacer una peticion al host.", "Se debe indicar un recurso en la peticion");
    echo include './index.html';
    exit();
}
// --------------- CON PETICIONES -----------------------------------
// print_r($uri);
// echo "<br>Metodo : " . $metodo;

$recurso = $uri[1];
$partes = count($uri);

switch ($metodo) {
    case 'GET':
        echo ($recurso);
        if ($recurso === "readme") {
            echo include './readme.html';
            exit();
        };
        break;
    case 'POST':
        if ($partes > 1) {
            mensajeError(400, 'El endpoint no admite tantas rutas.', 'Revisar documentacion como ayuda.');
        };
        break;
    case 'PUT':
        mensajeError(400, "La API no soporta ese metodo.", "Se debe indicar un recurso en la peticion");
        break;
    case 'DELETE':
        mensajeError(400, "La API no soporta ese metodo.", "Se debe indicar un recurso en la peticion");
        break;
    default:
        mensajeError(400, "La API no soporta ese metodo.", "Se debe indicar un recurso en la peticion");
        break;
}
