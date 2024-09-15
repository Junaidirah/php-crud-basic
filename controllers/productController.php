<?php
require_once __DIR__ . '/../models/product.php';

class productController {
    private $productModel;
    public function __construct() {
        $this->productModel = new Product();
    }
    // Get all products
    public function getAllProducts() {
        return $this->productModel->getProducts();
    }
    // Get a product by ID
    public function getProduct($id) {
        return $this->productModel->getProductById($id);
    }
    // Create a new product
    public function create($name, $price, $material, $toping, $expired) {
        return $this->productModel->createProduct($name, $price, $material, $toping, $expired);
    }
    // Update an existing product
    public function update($id, $name, $price, $material, $toping, $expired) {
        return $this->productModel->updateProduct($id, $name, $price, $material, $toping, $expired);
    }
    // Delete a product by ID
    public function delete($id) {
        return $this->productModel->deleteProduct($id);
    }
}
?>
