<?php
require_once '../controllers/productController.php';

if (isset($_GET['id'])) {
    $productController = new productController();
    $productController->delete($_GET['id']);
    header("Location: index.php");
}
?>
