<?php
include('connection.php');
$sql = "SELECT * FROM products WHERE product_category='watch' limit 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$watches = $stmt->get_result();

?>