<?php
include('server/connection.php');
if (isset($_POST['register'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    // if password dont match
    if ($password !== $confirmPassword) {
        header('location: register.php?error=password dont match');
    }
    //if password is too short
    else if (strlen($password) < 8) {
        header('location: register.php?password must be atleast 8 character');
        //if there is no error
    } else {

        $sql1 = "INSERT INTO users(user_name,user_email,password_hash) VALUES(?,?,?)";
        //check if user email already exist
        $sql2 = "SELECT count(*) FROM users WHERE user_email=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $stmt2->bind_result($num_rows);
        $stmt2->store_result();
        $stmt2->fetch();

        if ($num_rows != 0) {
            header('location: register.php?error=user with this email already exist');
            //every thing is correct
        } else {
            //create a new user
            $stmt = $conn->prepare($sql1);
            $stmt->bind_param("sss", $name, $email, md5($password));
            //if accounted is successful creted
            if ($stmt->execute()) {
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location:login.php?message=registered successfully please login');




            } // coulndnt create account
            else {
                header('location:register.php?error=couldnt creat account');


            }

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
    <title>resgisteration</title>
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

    <!-- register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">register</h2>
            <hr class="mx-auto">

        </div>
        <div class="mx-auto container">
            <form id="register-form" action="register.php" method="POST">
                <p style="color: red;">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    } ?>
                </p>
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="name" required>

                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="email"
                        required>

                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" class="form-control" id="register-password" name="password"
                        placeholder="password" required>

                </div>
                <div class="form-group">
                    <label for="">confirm password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirm-password"
                        placeholder="confirm-password" required>

                </div>
                <div class="form-group">

                    <input type="submit" class="btn" id="register-btn" name="register" value="Register">


                </div>
                <div class="form-group">

                    <a href="login.php" id="login-url" class="btn">already have account?login</a>

                </div>
            </form>
        </div>
    </section>

    <!-- footer -->
    <div class="container my-5">
        <!-- Start Footer -->
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo">የኛ ገበያ<br>
                            <h4 class="text-light">ጥራት ነዉ መለያችን<br>
                                ትጋት ነዉ ባህላችን</h4>
                        </h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                Hawasa, IOT Campus
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-success text-decoration-none" href="tel:010-020-0340">+251977012636</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-success text-decoration-none"
                                    href="yegnagebeya@gmail.com">yegnagebeya@gmail.com</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-success border-bottom pb-3 border-light">Products</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-white text-decoration-none" href="#">Luxury</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Sport Wear</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Men's Shoes</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Women's Shoes</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Popular Dress</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Gym Accessories</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Sport Shoes</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="text-success h2 border-bottom pb-3 border-light">Further Info</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-white text-decoration-none" href="#">Home</a></li>
                            <li><a class="text-white text-decoration-none" href="#">About Us</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Shop Locations</a></li>
                            <li><a class="text-white text-decoration-none" href="#">FAQs</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Contact</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row text-light mb-4">
                    <div class="col-12 mb-3">
                        <div class="w-100 my-3 border-top border-light"></div>
                    </div>
                    <div class="col-auto me-auto">
                        <ul class="list-inline text-left footer-icons">
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <label class="text-light sr-only" for="subscribeEmail">Email address</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                                placeholder="Email address">
                            <div class="input-group-text btn-success text-green">Subscribe</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 bg-black py-3">
                <div class="container">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="text-left text-light">
                                Copyright &copy; የኛ
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- End Footer -->
    </div>
    <!-- End of .container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>

</html>