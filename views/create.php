<?php
require_once '../controllers/productController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $toping = $_POST['toping'];
    $expired = $_POST['expired'];

    $productController = new productController();
    $productController->create($name, $price, $material, $toping, $expired);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create New Product</h1>
    <form method="POST" action="create.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br><br>

        <label for="material">Material:</label><br>
        <input type="text" id="material" name="material" required><br><br>

        <label for="toping">Toping:</label><br>
        <input type="text" id="toping" name="toping" required><br><br>

        <label for="expired">Expiration Date:</label><br>
        <input type="date" id="expired" name="expired" required><br><br>

        <input type="submit" value="Create">
    </form>
</body>
</html>
