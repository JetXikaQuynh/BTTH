<?php

require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$productController = new ProductController();

switch ($action) {
    case 'index':
        $productController->index();
        break;
    case 'create':
        $productController->create();
        break;
    case 'store':
        $productController->store();
        break;
    case 'edit':
        $productController->edit();
        break;
    case 'update':
        $productController->update();
        break;
    case 'delete':
        $productController->delete();
        break;
    default:
        $productController->index();
        break;
}
