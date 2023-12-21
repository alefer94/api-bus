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