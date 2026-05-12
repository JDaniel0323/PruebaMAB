<?php
require_once(__DIR__ . "/../models/connection.php");
$conn = new connection();

if (isset($_POST['btnregistrar'])) {
    $nombre = trim($_POST["txtusuario"]);
    $pass = $_POST["txtpassword"];

    if (!empty($nombre) && !empty($pass)) {
        $registro = $conn->registerUser($nombre, $pass);

        if ($registro) {
            echo "<script>
                    alert('Usuario registrado con éxito.');
                    window.location='../views/V_LoginUni.php';
                  </script>";
        } else {
            echo "<script>alert('Error: El nombre de usuario ya existe o hubo un problema.');</script>";
        }
    } else {
        echo "<script>alert('Por favor, completa todos los campos.');</script>";
    }
}
require(__DIR__ . "/../views/V_RegisterUni.php");
?>