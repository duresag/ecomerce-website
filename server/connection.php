<?php
$conn = mysqli_connect('localhost', 'root', '', 'proj_project')
    or die("coudnt connect to db");
if (!$conn) {
    echo "Server connection Unsuccessful";
}
?>