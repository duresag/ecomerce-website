<?php
include('connection.php');
$sql = "SELECT * FROM products WHERE product_category='coat' limit 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$coats = $stmt->get_result();

?>