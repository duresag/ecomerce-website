<?php
include("connection.php");
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$query = mysqli_query($conn, "SELECT user_email FROM users WHERE user_email='" . $email . "'");
$a = mysqli_num_rows($query);

if (empty($name)) {
    die("name is required");
}
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("vailid email is reqiuired");

}
if ($a >= 1) {
    die("email already registered");
}
if (strlen($password) < 8) {
    die("password must contain at least 8 character");

}
if (!preg_match("/[a-z]/", $password)) {
    die("password must contain at least one letter");
}
if (!preg_match("/[1-9]/", $_POST["password"])) {
    die("password must contain at least one number");
}
if ($_POST["password"] !== $_POST["confirm-password"]) {
    die("password must be similar");
}
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/connection.php";
$sql = "INSERT INTO users(user_name,user_email,password_hash) VALUES(?,?,?)";
$stmt = mysqli_stmt_init($conn);
if (!$stmt->prepare($sql)) {
    echo ("faild");
} else {
    $stmt->bind_param(
        "sss",
        $name,
        $email,
        $password_hash
    );
}
if ($stmt->execute()) {
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    header("location:../login.php");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("email alredy taken");
    }
    die($mysqli->error . " " . $mysqli->errno);

}




?>