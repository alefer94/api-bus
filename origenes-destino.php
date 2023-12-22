<?php

require_once('./model/conexion.php');
require_once('origenes-destino.php');

// Verificar si es una solicitud GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Establecer encabezados para respuesta JSON
    header('Content-Type: application/json');
    obtenerOrigenyDestino($conexion);
    
} else {
    // Si no es una solicitud GET, mostrar un mensaje de error
    http_response_code(405); // Método no permitido
    echo json_encode(array("mensaje" => "Método no permitido"));
}