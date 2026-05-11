<?php


class connection{

    private $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "MAB", 3307);
    }
    public function getProducts(){
        $query = $this->conn->query("SELECT id, nombre, precio, stock from PRODUCTOS");

        $return = [];

        $i = 0;
        while($row = $query->fetch_assoc()){
            $return[$i] = $row;
            $i++;
        }

        return $return;
    }

    public function getProductsID($id){
        $query = $this->conn->query("SELECT id,  nombre, precio, stock from PRODUCTOS WHERE id = $id");

        $return = [];

        $i = 0;
        while($row = $query->fetch_assoc()){
            $return[$i] = $row;
            $i++;
        }

        return $return;
    }

    public function insertProduct($nombre, $precio, $stock){
        $query = $this->conn->query("INSERT INTO PRODUCTOS (nombre, precio, stock) VALUES ('$nombre', $precio, $stock)");
        return $query;
    }

    public function updateProduct($id, $nombre, $precio, $stock){
        $query = $this->conn->query("UPDATE PRODUCTOS SET nombre='$nombre', precio=$precio, stock=$stock WHERE id=$id");
        return $query;
    }
    
    public function deleteProduct($id){
        $query = $this->conn->query("DELETE FROM PRODUCTOS WHERE id=$id");
        return $query;
    }

}


?>