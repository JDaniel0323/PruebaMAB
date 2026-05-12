<?php
session_start();
require_once("../models/connection.php");

$conn = new connection();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit("No autorizado");
}

$db = new connection();
$userId = $_SESSION['user_id'];
$pais = $_POST['country'] ?? 'Desconocido';

if (isset($_FILES['pdf'])) {
    $fecha = date("Ymd_His");
    $nombreArchivo = session_id() . "_" . $fecha . ".pdf";
    $rutaRelativa = "pdfs/" . $nombreArchivo;
    $rutaFisica = "../" . $rutaRelativa;

    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $rutaFisica)) {
        
        $db->saveUniversity($userId, $pais, $rutaRelativa);
        
        echo "Guardado con éxito";

    } else {
        http_response_code(500);
        echo "Error al mover el archivo";
    }
}