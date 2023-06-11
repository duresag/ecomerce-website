<?Php
session_start();
if (isset($_POST['add_to_cart'])) {
    // if there is already a product
    if (isset($_SESSION['cart'])) {
        $product_array_ids = array_column($_SESSION['cart'], "product_id");
        //if product has already added to cart
        if (!in_array($_POST['product_id'], $product_array_ids)) {
            $product_id = $_POST['product_id'];
            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity'],
            );
            $_SESSION['cart'][$product_id] = $product_array;

        } else {
            echo "<script>alert('product is already on the cart')</script>";
        }

    }
    // if this is the first product that is added
    else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_image = $_POST['product_image'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity


        );
        $_SESSION['cart'][$product_id] = $product_array;


    }
    //calculate total
    calculateTotalCart();

}
///to remove
elseif (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    calculateTotalCart();
} elseif (isset($_POST['edit_quantity'])) {
    //we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    //get the product array from the session

    $product_array = $_SESSION['cart'][$product_id];
    //update the quantity
    $product_array['product_quantity'] = $product_quantity;
    //return the array
    $_SESSION['cart'][$product_id] = $product_array;
    calculateTotalCart();


} else {

}

function calculateTotalCart()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];
        $total = $total + ($price * $quantity);

    }
    $_SESSION['total'] = $total;
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
    <!-- cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolder">your cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>product</th>
                <th>quantity</th>
                <th>subtotal</th>
            </tr>
            <?php if (isset($_SESSION['cart'])) { ?>
                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="assets/images/brands/<?php echo $value['product_image']; ?>" alt="">
                                <div>
                                    <p>
                                        <?php echo $value['product_name']; ?>
                                    </p>
                                    <small><span>ETB</span>
                                        <?php echo $value['product_price']; ?>
                                    </small>
                                    <br>
                                    <form action="cart.php" method="POST" class="cart">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                        <input type="submit" class="rbtn" name="remove_product" value="remove">


                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                <input type="number" min="1" name="product_quantity"
                                    value="<?php echo $value['product_quantity']; ?>">
                                <input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                            </form>

                        </td>
                        <td>
                            <span>ETB </span>
                            <span class="product-price">
                                <?php echo $value['product_quantity'] * $value['product_price']; ?>
                            </span>
                        </td>
                    </tr>
                <?php }
            } ?>



        </table>
        <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>subtotal</td>
                    <td>$156</td>
                </tr> -->
                <tr>
                    <td>total</td>
                    <td>etb
                        <?php echo $_SESSION['total']; ?>
                    </td>
                </tr>

            </table>
        </div>
        <div class="checkout-container">
            <button class="btn checkout-btn">checkout</button>
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