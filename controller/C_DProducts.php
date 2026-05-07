<?php

    include_once(__DIR__ . "/../models/connection.php");
    $id = $_GET['id'];
    $delete = new connection();
    $result = $delete->deleteProduct($id);

    if ($result) {
        header("Location: ../index.php");
    } else {
        echo "Error al eliminar el producto.";
    }