<?php

require_once(__DIR__ . "/../models/connection.php");

$conn = new connection();

session_start();

if(!isset($_SESSION['nombredelusuario']))
{
    header("Location: ../views/V_LoginUni.php");
    exit();
}

if(!isset($_SESSION['user_id'])) {
    header("Location: ../views/V_LoginUni.php");
    exit();
}

$pais = $_GET['country'] ?? 'Colombia';
$universidades = []; 


if (!empty($pais)) {
    $universidades = $conn->getUniversity($pais);
}
$universidades = $conn->getUniversity($pais);
$historial = $conn->getHistory($_SESSION['user_id']); 

require(__DIR__ . "/../views/V_RPanelUni.php");