<?php
include('server/connection.php');
include('stats.php');

$visits = $numview + 1;
$sql = "UPDATE stat SET total_visits='$visits'";
$qrun = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>www.yegna.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/6201dad2b0.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" href="assets/icon/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="assets/icon/site.webmanifest">
    <style>
        .product img {
            width: 60%;
            height: 70%;
            box-sizing: border-box;

        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  py-4 fixed-top">
        <div class="container">
            <img src="assets/images/g.jpg" alt="logo" />

            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shope</a>
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
    <!-- banner -->
    <div id="hero-carousel" class="hero py-5 carousel slide " data-bs-ride="carousel">
        <ol class="list-unstyled carousel-indicators">
            <li data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="bg- carousel-inner container">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5 bann">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="assets/images/category_img_02.jpg" alt="">

                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>የኛ </b> ገበያ</h1>
                                <h3 class="h2">ዘመናዊ መጌጫ</h3>
                                <p>ፈጥነዉ ይዘዙን ካሉበት አለን::</p>
                                <a href="shop.php" class="btn btn-light py-2 px-3">ይሸምቱ</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="container row p-5 ">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="assets/images/banner_img_01.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-success  text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3"> Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="assets/images/category_img_01.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">dchjsedjknhjjksndcj</h1>
                                <h3 class="h2">bitta </h3>
                                <p>
                                    <a href="shop.php" class="py-2  px-3 btn btn-light">Bittaa</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#hero-carousel" role="button"
            data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#hero-carousel" role="button"
            data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- end banner -->

    <!-- featured -->
    <section id="featured" class="my-3 pb-2">
        <div class="container text-center mt-5 py-5">
            <h3>featured products</h3>

            <hr class="mx-auto" />
            <p>here you can see featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include("server\get_product.php") ?>
            <?php while ($row = $featured_products->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-6">
                    <img class="img-fluid mb-3 " src="assets/images/brands/<?php echo $row['product_image'] ?>" alt="" />
                    <h5 class="p-name">
                        <?php echo $row['product_name'] ?>
                    </h5>
                    <h4 class="p-price">
                        <?php echo $row['product_price'] ?> ETB
                    </h4>
                    <a href="<?php echo "singlepro.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">buy
                            now</button></a>

                </div>
            <?php } ?>
            < </div>
    </section>

    <!-- shoes -->
    <section id="shoes" class="my-3">
        <div class="container text-center mt-3 py-3">
            <h3>shoes</h3>
            <hr class="mx-auto" />
            <p>here you can see our shoes products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include("server\get_shoes.php"); ?>
            <?php while ($row = $shoes_products->fetch_assoc()) { ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-6">
                    <img class="img-fluid mb-3" src="assets/images/brands/<?php echo $row['product_image']; ?>" alt="img" />
                    <h5 class="p-name">
                        <?php echo $row['product_name']; ?>
                    </h5>
                    <h4 class="p-price">
                        <?php echo $row['product_price']; ?> ETB
                    </h4>
                    <a href="<?php echo "singlepro.php?product_id=" . $row['product_id']; ?>"><button class=" buy-btn">buy
                            now</button></a>
                </div>
            <?php } ?>

        </div>
    </section>
    <!-- coats -->
    <section id="featured" class="my-2 pb-2">

        <div class="container text-center mt-3 py-3">
            <h3>coats</h3>
            <hr class="mx-auto" />
            <p>new arriving coats and jackets</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include("server\get_coats.php"); ?>
            <?php while ($row = $coats->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-6">
                    <img class="img-fluid mb-3" src="assets/images/brands/<?php echo $row['product_image']; ?>" alt="" />
                    <h5 class="p-name">
                        <?php echo $row['product_name']; ?>
                    </h5>
                    <h4 class="p-price">
                        <?php echo $row['product_price']; ?>ETB
                    </h4>
                    <a href="<?php echo "singlepro.php?product_id=" . $row['product_id']; ?>"><button class=" buy-btn">buy
                            now</button></a>
                </div>
            <?php } ?>



        </div>
    </section>
    <!-- watches -->
    <section id="featured" class="my-2 pb-3">
        <div class="container text-center mt-3 py-3">
            <h3>watches</h3>
            <hr class="mx-auto" />
            <p>our best watches</p>
        </div>

        <div class="row mx-auto container-fluid">
            <?php include("server\get_watches.php"); ?>
            <?php while ($row = $watches->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-6">
                    <img class="img-fluid mb-3" src="assets/images/brands/<?php echo $row['product_image']; ?>" alt="" />
                    <h5 class="p-name">
                        <?php echo $row['product_name']; ?>
                    </h5>
                    <h4 class="p-price">
                        <?php echo $row['product_price']; ?>ETB
                    </h4>
                    <a href="<?php echo "singlepro.php?product_id=" . $row['product_id']; ?>"><button class=" buy-btn">buy
                            now</button></a>
                </div>
            <?php } ?>



        </div>

    </section>

    <!-- banner -->
    <section id="banner" class="my-3 py-3">
        <div class="container">
            <h4>new years sale</h4>
            <h1>cultural collection<br />up to 20% off</h1>
            <button class="text-uppercase">shop now</button>
        </div>
    </section>
    <div class="container my-5">
        <!-- <footer class="bg-dark text-center text-lg-start text-white"> -->
        <!-- Grid container -->
        <!-- <div class="container p-4"> -->
        <!--Grid row-->
        <!-- <div class="row mt-4"> -->
        <!--Grid column-->
        <!-- <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">See other books</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>Bestsellers</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>All books</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Our
                  authors</a>
              </li>
            </ul>
          </div> -->
        <!--Grid column-->

        <!--Grid column-->
        <!-- <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Execution of the contract</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Supply</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-backspace fa-fw fa-sm me-2"></i>Returns</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Regulations</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Privacy
                  policy</a>
              </li>
            </ul>
          </div> -->
        <!--Grid column-->

        <!--Grid column-->
        <!-- <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
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
                <a href="#!" class="text-white"><i class="fas fa-briefcase fa-fw fa-sm me-2"></i>Send us a
                  book</a>
              </li>
            </ul>
          </div>
          Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <!-- <h5 class="text-uppercase">Write to us</h5> -->

            <ul class="list-unstyled">
                <li>
                    <a href="#!" class="text-white"><i class="fas fa-at fa-fw fa-sm me-2"></i>Help in
                        purchasing</a>
                </li>
                <li>
                    <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Check
                        the order status</a>
                </li>
                <li>
                    <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>Join the
                        newsletter</a>
                </li>
            </ul>
        </div>
        <!--Grid column-->
        <!-- </div> -->
        <!--Grid row-->
        <!-- </div> -->
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)"></div>
        <!-- Copyright -->
        </footer>
    </div>
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
                            <a class="text-success text-decoration-none" href="tel:+251940015859+">+251913889486</a>
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
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
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
    <!-- End of .container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>

</html>