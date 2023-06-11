<?php
session_start();
include('../server/connection.php');
if (!isset($_SESSION['admin-logged-in'])) {
    header('location:login.php');
    exit;
}
$user_email = $_SESSION['admin-email'];
$admin_name = $_SESSION['admin-name'];
if (isset($_GET['logout'])) {
    if (isset($_SESSION['admin-logged-in'])) {
        unset($_SESSION['admin-logged-in']);
        unset($_SESSION['admin-name']);
        unset($_SESSION['admin-email']);
        header('location:login.php');
        exit;


    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .form-control {
            border: 1px solid #b3a1a1 !important;
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        admin
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/6201dad2b0.js" crossorigin="anonymous"></script>

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets\css\material-dashboard.min.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php include('sidebar.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">