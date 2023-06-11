<?php
include('connection.php');
$sql = "SELECT * FROM products WHERE product_category='shoes' limit 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$shoes_products = $stmt->get_result();

?>