<?php

require_once __DIR__ . '/controllers/ProductController.php';

$productController = new ProductController();

$action = $_GET['action'] ?? 'index'; // Si $_GET['action'] est null ou vide, alors on renvoi index. Sinon on renvoi $_GET['action']
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'view':           // si tu veux garder 'view' au lieu de 'show'
        $productController->show($id);
        break;
    case 'create':
        $productController->create();
        break;
    case 'index':
        $productController->index();
        break;
    case 'store':
        $productController->store();
        break;
    case 'edit':
        $productController->edit($id);
        break;
    case 'update':
        $productController->update();
        break;
    case 'delete':
        $productController->delete($id);
        break;
    default:
        $productController->forbidden();
        break;
}
