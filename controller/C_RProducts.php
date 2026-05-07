<?php

require_once(__DIR__ . "/../models/connection.php");
$conn = new connection();

$products = $conn->getProducts();

require(__DIR__ . "/../views/V_RProducts.php");

?>