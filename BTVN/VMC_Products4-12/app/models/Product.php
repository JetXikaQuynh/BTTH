<?php

class Product
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($this->conn));
        }

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }

    public function createProduct($name, $price)
    {
        $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Insert failed: " . mysqli_error($this->conn));
        }
        return true;
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($this->conn));
        }
        return mysqli_fetch_assoc($result);
    }

    public function updateProduct($id, $name, $price)
    {
        $sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Update failed: " . mysqli_error($this->conn));
        }
        return true;
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Delete failed: " . mysqli_error($this->conn));
        }
        return true;
    }
}
