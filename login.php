<?php
session_start();

include('server/connection.php');



if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql1 = "SELECT user_id,user_name,user_email,password_hash FROM users WHERE user_email=? AND password_hash=? LIMIT 1";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param('ss', $email, md5($password));
    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $user_name, $user_email, $password_hash);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            $_SESSION['user-id'] = $user_id;
            $_SESSION['user-name'] = $user_name;
            $_SESSION['user-email'] = $user_email;
            $_SESSION['logged-in'] = true;

            header('location:account.php?massage=login successful');





        } else {
            header('location:login.php?error=incorrect username or password');

        }

    } else {
        header('location:login.php?error=something went wrong');


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

    <!-- login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">login</h2>
            <hr class="mx-auto">

        </div>
        <div class="mx-auto container">
            <form id="login-form" method="POST" action="login.php">
                <p style="color: red;" class="text-center">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    } ?>
                </p>
                <p style="color: green;" class="text-center">
                    <?php if (isset($_GET['message'])) {
                        echo $_GET['message'];
                    } ?>
                </p>

                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" class="form-control" id="login-email" name="email"
                        placeholder="eg.jhon@gmail.com" required>

                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" class="form-control" id="login-password" name="password"
                        placeholder="password" required>

                </div>
                <div class="form-group">

                    <input type="submit" class="btn" id="login-btn" value="login" name="login_btn">


                </div>
                <div class="form-group">

                    <a href="register.php" id="register-url" class="btn">don't have account?register</a>

                </div>
            </form>
        </div>
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