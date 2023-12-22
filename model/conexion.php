<?php


$host = "95.217.205.168";
$usuario = "ws";
$password = "#wS#Ws#";
$basededatos = "ws";


$conexion = new mysqli($host, $usuario, $password, $basededatos);


if($conexion->connect_error){
    die("Error connecting to");
}

header("Content-Type: application/json");



function obtenerOrigenyDestino($conexion){
    $sql = "SELECT oficinas.oficina AS sourceName, 
                       ruta.idoficina AS sourceId, 
                       ruta.nro_certificacion AS destinationName, 
                       ruta.id_ruta AS destinationId 
                FROM ruta 
                INNER JOIN oficinas ON ruta.idoficina = oficinas.idoficina 
                WHERE oficinas.ver = 1 
                ORDER BY ruta.idoficina, ruta.destino";


    $results = $conexion->query($sql);

    $resultArray = array();
    foreach ($results as $key) {
        $resultArray[] = array(
            "origen" => array(
                "id" => $key['sourceId'],
                "nombre" => $key['sourceName']
            ),
            "destino" => array(
                "id" => $key['destinationId'],
                "nombre" => $key['destinationName']
            )
        );
    }

    // Convertir el array a formato JSON
    $jsonResult = json_encode($resultArray);

    // Imprimir el resultado en formato JSON
    echo $jsonResult;
}


obtenerOrigenyDestino($conexion);


