<?php
    include_once(__DIR__ . "/../models/connection.php");

    $Id = $_POST['id'];
    $Nombre = $_POST['nombre'];
    $Precio = $_POST['precio'];
    $Stock = $_POST['stock'];

    $errors = [];

    if ($Id == "" || $Id <= 0) {
        die("ID inválido");
    }

    if ($Nombre === '') {
        $errors[] = "El nombre no puede estar vacío";
    }

    if ($Precio == "" || $Precio <= 0) {
        die("precio debe ser mayor a 0");
    }

    if ($Stock == "" || $Stock < 0) {
        die("stock no puede ser negativo");
    }

    $update = new connection();
    $result = $update->updateProduct($Id, $Nombre, $Precio, $Stock);

    if ($result === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error al actualizar el producto.";
    }

?>