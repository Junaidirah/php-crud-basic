<?php
require_once '../controllers/productController.php';

$productController = new productController();
$products = $productController->getAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Products</h1>
    <a href="create.php">Create New Product</a>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name']; ?> - <?php echo $product['price']; ?>
                <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
