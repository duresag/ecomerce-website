<?php include('..\server\connection.php'); ?>
<!-- connection.php C:\xampp\htdocs\proj\admin\stats.php -->
<!-- where i am  C:\xampp\htdocs\proj\server\connection.php -->

<?php
$sql = "SELECT total_visits FROM stat";
$qrun = mysqli_query($conn, $sql);
$stat = mysqli_fetch_row($qrun);
$numview = $stat['0'];
//////////////////////////////
$sql1 = "SELECT COUNT(*) FROM users";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result);
$count = $row[0];
/////////////////////////
$sql2 = "SELECT COUNT(*) FROM products";
$re = mysqli_query($conn, $sql2);
$rol = mysqli_fetch_array($re);
$numpro = $rol[0];

?>