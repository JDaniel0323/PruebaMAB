<?php
    include_once(__DIR__ . "/../models/connection.php");

    $Nombre = $_POST['nombre'];
    $Precio = $_POST['precio'];
    $Stock = $_POST['stock'];

    $errors = [];


    if ($Nombre === '') {
        $errors[] = "El nombre no puede estar vacío";
    }

    if ($Precio == "" || $Precio <= 0) {
        die("precio debe ser mayor a 0");
    }

    if ($Stock == "" || $Stock < 0) {
        die("stock no puede ser negativo");
    }

    $insert = new connection();

    $result = $insert->insertProduct($Nombre, $Precio, $Stock);

    if ($result === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error al guardar el producto.";
    }

?>