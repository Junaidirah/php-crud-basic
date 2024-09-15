<?php
require_once __DIR__ . '/../db/db.php';


class Product {
    private $db;
    public function __construct() {
        $this->db = db::getConnection();
    }
    // Get all products (READ)
    public function getProducts() {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get a single product by ID (READ)
    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Create a new product (CREATE)
    public function createProduct($name, $price, $material, $toping, $expired) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':material', $material);
        $stmt->bindParam(':toping', $toping);
        $stmt->bindParam(':expired', $expired);
        return $stmt->execute();
    }
    // Update an existing product (UPDATE)
    public function updateProduct($name, $price, $material, $toping, $expired) {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':material', $material);
        $stmt->bindParam(':toping', $toping);
        $stmt->bindParam(':expired', $expired);
        return $stmt->execute();
    }
    // Delete a product by ID (DELETE)
    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
