<?php
include('server/connection.php');
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("select *from products where product_id=?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result();
} else {
    header('location:index.php');
}
;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>single_product</title>
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
            <img src="assets/images/logo.jg" alt="logo" />

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
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
            <?php while ($row = $product->fetch_assoc()) {
                $category = $row["product_category"];
                ?>


                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="mainimg">
                        <img class="img-fluid w-100 p-1" src="assets/images/brands/<?php echo $row['product_image'] ?>"
                            id="mainImg">
                    </div>
                    <div class="small-img-group ">
                        <div class="small-img-clo">
                            <img src="assets/images/brands/<?php echo $row['product_image'] ?>" width=100%
                                class="small-img">
                        </div>
                        <div class="small-img-clo">
                            <img src="assets/images/brands/<?php echo $row['product_image2'] ?>" width=100%
                                class="small-img">
                        </div>
                        <div class="small-img-clo">
                            <img src="assets/images/brands/<?php echo $row['product_image3'] ?>" width=100%
                                class="small-img">
                        </div>
                        <div class="small-img-clo">
                            <img src="assets/images/brands/<?php echo $row['product_image4'] ?>" width=100%
                                class="small-img">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-1  2">
                    <h6>sport shoes</h6>
                    <h3 class="py-4">
                        <?php echo $row['product_name']; ?>
                    </h3>
                    <h4>ETB
                        <?php echo $row['product_price']; ?>
                    </h4>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>" />
                        <input type="hidden" name="product_image" value="<?php echo $row['product_image'] ?>" />
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />
                        <input type="number" min="1" name="product_quantity" value="1">
                        <button class="buy-btn" type="submit" name="add_to_cart">add to cart</button>

                    </form>
                    <h4 class="mt-5 mb-5">
                        <?php echo $row['product_category']; ?>
                    </h4>
                    <span>
                        <?php echo $row['product_description']; ?>
                    </span>

                </div>

            <?php } ?>
        </div>
    </section>
    <!-- related products -->

    <section id="related_products " class="my-3 pb-3">
        <div class="container text-center mt-5 py-5">
            <h3>related products</h3>
            <hr class="mx-auto" />

        </div>
        <div class="row mx-auto container-fluid">
            <?php
            $sql = "select *from products where product_category='$category' limit 4";
            $qrun = mysqli_query($conn, $sql);
            if (mysqli_num_rows($qrun) > 0) {
                foreach ($qrun as $item) {
                    ?>

                    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
                        <img class="img-fluid mb-3" src="assets/images/brands/<?php echo $item['product_image']; ?>" alt="" />
                        <h5 class="p-name">
                            <?php echo $item['product_name']; ?>
                        </h5>
                        <h4 class="p-price">
                            <?php echo $item['product_price']; ?>
                        </h4>
                        <a href="<?php echo "singlepro.php?product_id=" . $item['product_id']; ?>"><button class=" buy-btn">buy
                                now</button></a>
                    </div>
                    <?php
                }


            } else {
                echo "other related products will come soon";

            }


            ?>

        </div>
    </section>
    <!-- footer -->
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
                            <a href="#!" class="text-white"><i class="fas fa-backspace fa-fw fa-sm me-2"></i>Returns</a>
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
                            <a href="#!" class="text-white"><i class="fas fa-briefcase fa-fw fa-sm me-2"></i>Send us a
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
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)"></div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <script>
        var mainImg = document.getElementById("mainImg")
        var smallImg = document.getElementsByClassName("small-img")

        for (let i = 0; i < 4; i++) {
            smallImg[i].onclick = function () {
                mainImg.src = smallImg[i].src;
            }
        }
    </script>

</body>

</html>