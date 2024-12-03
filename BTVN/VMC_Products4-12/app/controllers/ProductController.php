<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../config/database.php';

class ProductController
{
    private $product;

    public function __construct()
    {
        global $conn;
        $this->product = new Product($conn);
    }

    public function index()
    {
        $products = $this->product->getAllProducts();
        require_once __DIR__ . '/../views/products/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/products/create.php';
    }

    public function store()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        if ($this->product->createProduct($name, $price)) {
            // header("Location: /30-11/public/index.php?action=index&message=Thêm sản phẩm thành công");
            echo "<script>alert('insert success');</script>";
            header("Location:./index.php");
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->product->getProductById($id);
        require_once __DIR__ . '/../views/products/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        if ($this->product->updateProduct($id, $name, $price)) {
            // header("Location: /30-11/public/index.php?action=index&message=Sửa sản phẩm thành công");
            echo "<script>alert('edit sucess');</script>";
            header("Location:./index.php");
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($this->product->deleteProduct($id)) {
            // header("Location: /30-11/public/index.php?action=index&message=Xóa sản phẩm thành công");
            echo "<script>alert('delete success');</script>";
            header("Location:./index.php");
        }
    }
}
