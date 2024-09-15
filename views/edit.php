<?php
require_once '../controllers/productController.php';

$productController = new productController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $toping = $_POST['toping'];
    $expired = $_POST['expired'];
    $productController->update($id, $name, $price, $material, $toping, $expired);
    header("Location: index.php");
    exit(); // Ensure that no further code is executed after the redirect
}

if (isset($_GET['id'])) {
    $product = $productController->getProduct($_GET['id']);
    // Handle case where product is not found
    if (!$product) {
        echo "Product not found.";
        exit();
    }
} else {
    echo "No product ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br><br>

        <label for="material">Material:</label><br>
        <input type="text" id="material" name="material" value="<?php echo htmlspecialchars($product['material']); ?>" required><br><br>

        <label for="toping">Toping:</label><br>
        <input type="text" id="toping" name="toping" value="<?php echo htmlspecialchars($product['toping']); ?>" required><br><br>

        <label for="expired">Expiration Date:</label><br>
        <input type="date" id="expired" name="expired" value="<?php echo htmlspecialchars($product['expired']); ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
