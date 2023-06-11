<?php
session_start();
include('server/connection.php');
if (!isset($_SESSION['logged-in'])) {
    header('location:login.php');
    exit;
}
$user_email = $_SESSION['user-email'];
$user_name = $_SESSION['user-name'];
if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged-in'])) {
        unset($_SESSION['logged-in']);
        unset($_SESSION['user-name']);
        unset($_SESSION['user-email']);
        header('location:login.php');
        exit;


    }
}


if (isset($_POST['change_password'])) {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];
    // if password dont match

    if ($password !== $confirmPassword) {
        header('location: account.php?error=password dont match');
    }
    //if password is too short
    else if (strlen($password) < 8) {
        header('location: account.php?error=password must be atleast 8 character');
        //if there is no error
    } else {
        $sql2 = "UPDATE users SET password_hash=? WHERE user_email=?";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param('ss', md5($password), $user_email);


        if ($stmt->execute()) {
            header('location:account.php?message=password changed');
        } else {
            header('location:account.php?error=couldnt update password');

        }




    }





}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
    <script src="https://kit.fontawesome.com/6201dad2b0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  py-4 fixed-top">
        <div class="container">
            <img src="assets/images/" alt="logo" />

            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">shope</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">cart <i class="fa-solid fa-cart-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">account <i class="fa-solid fa-user-tie"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- account-->
    <section class="mt-5 pt-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name: <span>
                            <?php if (isset($_SESSION['user-name'])) {
                                echo ($user_name);
                            }
                            ?>
                        </span></p>
                    <p>Email: <span>
                            <?php if (isset($_SESSION['user-email'])) {
                                echo ($user_email);
                            }
                            ?>
                        </span></p>
                    <p><a href="" id="orders-btn">your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">logout</a></p>




                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                    <p style="color: red;" class="text-center">
                        <?php if (isset($_GET['error'])) {
                            echo $_GET['error'];

                        } ?>
                    </p>

                    <p style="color:green ;" class="text-center">
                        <?php if (isset($_GET['message'])) {
                            echo $_GET['message'];
                        } ?>
                    </p>
                    <h3>change password</h3>
                    <hr class="mx-auto">


                    <div class="form-grop">
                        <label for="">new password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="password"
                            placeholder="new password">

                    </div>
                    <div class="form-grop">
                        <label for="">confirm new password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmpassword"
                            placeholder="new password">

                    </div>
                    <div class="formgroup">
                        <input type="submit" value="change password" name="change_password" class="btn"
                            id="change-pass-btn">

                    </div>


                </form>

            </div>

        </div>


    </section>

    <!-- orders -->
    <section class="orders container my-3 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bolder text-center">your orders</h2>
            <hr class="mx-auto">
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>product</th>
                <th>Date</th>

            </tr>
            <tr>
                <td>

                    <div class="product-info">
                        <img src="assets/images/brands/shoe1.jfif" alt="">
                        <div>
                            <p class="mt-3">white shoes</p>
                        </div>
                    </div>
                </td>
                <td>
                    <span>2036-5-4</span>

                </td>


            </tr>



        </table>

    </section>
    <!-- footer -->
    <div class="container my-5">
        <footer class="bg-dark text-center text-lg-start text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row mt-4">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">See other books</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-book fa-fw fa-sm me-2"></i>Bestsellers</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>All
                                    books</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Our
                                    authors</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Execution of the contract</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Supply</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-backspace fa-fw fa-sm me-2"></i>Returns</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="far fa-file-alt fa-fw fa-sm me-2"></i>Regulations</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Privacy
                                    policy</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Publishing house</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white">The BookStore</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">123 Street</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">05765 NY</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-briefcase fa-fw fa-sm me-2"></i>Send us
                                    a
                                    book</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Write to us</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-at fa-fw fa-sm me-2"></i>Help in
                                    purchasing</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Check
                                    the order status</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>Join the
                                    newsletter</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)"></div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- End of .container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>

</html>