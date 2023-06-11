<?php
include('connection.php');
$stmt = $conn->prepare("select *from products");
$stmt->execute();
$products = $stmt->get_result();

?>