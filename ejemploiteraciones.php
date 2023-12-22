<?php

// Supongamos que obtienes estos datos de tu consulta SQL
$datosConsulta = [
    ['id' => 1, 'nombre' => 'Ejemplo 1', 'tipo' => 'A'],
    ['id' => 2, 'nombre' => 'Ejemplo 2', 'tipo' => 'B'],
    ['id' => 3, 'nombre' => 'Ejemplo 3', 'tipo' => 'A'],
    // ... más datos obtenidos de la consulta
];

// Estructura de datos deseada para el JSON
$estructuraJSON = [
    'datos' => [],
    'metadatos' => [
        'total' => count($datosConsulta),
        'fecha' => date('Y-m-d')
    ]
];

// Iterar sobre los datos obtenidos de la consulta para estructurarlos en la forma deseada
foreach ($datosConsulta as $dato) {
    $estructuraJSON['datos'][] = [
        'id' => $dato['id'],
        'titulo' => $dato['nombre'],
        'categoria' => $dato['tipo']
    ];
}

// Convertir la estructura de datos en un JSON
$jsonFinal = json_encode($estructuraJSON, JSON_PRETTY_PRINT);

// Imprimir el JSON resultante
echo $jsonFinal;