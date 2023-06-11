<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>shop</title>
  <script src="https://kit.fontawesome.com/6201dad2b0.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
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
  <!-- featured -->
  <section id="featured" class="my-3 pb-3">
    <div class="container text-center mt-5 py-5">
      <h3> products</h3>
      <hr class="mx-auto" />
      <p>here you can see all products</p>
    </div>
    <div class="row mx-auto container-fluid">
      <?php include("server\shopitem.php") ?>
      <?php while ($row = $products->fetch_assoc()) { ?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-6"
          onclick="window.location.href='<?php echo "singlepro.php?product_id=" . $row['product_id']; ?>'">
          <img class="img-fluid mb-3" src="assets/images/brands/<?php echo $row['product_image'] ?>" alt="" />


          <h5 class="p-name">
            <?php echo $row['product_name'] ?>
          </h5>
          <h4 class="p-price">
            <?php echo $row['product_price'] ?> ETB
          </h4>

        </div>
      <?php } ?>

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
</body>

</html>