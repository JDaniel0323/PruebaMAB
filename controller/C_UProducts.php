<?php
    include_once(__DIR__ . "/../models/connection.php");
    $id = $_GET['id'];
    $update = new connection();
    $Uproduct = $update->getProductsID($id);

    include_once(__DIR__ . "/../views/V_UProducts.php");

?>