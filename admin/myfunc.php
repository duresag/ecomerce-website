<?php
include('../server/connection.php');

function getAll($table)
{
    global $conn;
    $query = " SELECT * FROM $table";
    $qrun = mysqli_query($conn, $query);
}
?>