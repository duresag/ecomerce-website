<?php include('includes\header.php'); ?>
<?php include('includes\navbar.php');
include('../server/connection.php'); ?>
<?php if (isset($_GET['search'])) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4>search results</h4>
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>product ID</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>PRICE</th>
                                    <th>edit</th>
                                    <th>delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT * FROM products WHERE CONCAT(product_name,product_category,product_id) LIKE '%$filtervalues%' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $items['product_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $items['product_name'] ?>
                                                </td>
                                                <td>
                                                    <img width="50px" height="50px"
                                                        src="../assets/images/brands/<?php echo $items['product_image'] ?>" alt="img" />
                                                </td>
                                                <td>
                                                    <?php echo $items['product_price'] ?>
                                                </td>
                                                <td>
                                                    <a href="editpro.php?id=<?php echo $items['product_id'] ?>"
                                                        class="btn btn-primary">edit</a>

                                                    </form>

                                                </td>
                                                <td>
                                                    <form action="deletepro.php" method="POST">
                                                        <input type="hidden" name="product-id"
                                                            value="<?php echo $items['product_id'] ?>">
                                                        <button type="submit" class="btn btn-danger" name="deletebtn"> delete </button>

                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>all products</h4>
                    <p style="color: red;" class="text-center">
                        <?php if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        } ?>
                    </p>
                    <p style="color: green;" class="text-center">
                        <?php if (isset($_GET['message'])) {
                            echo $_GET['message'];
                        } ?>

                </div>
                <div class="card-body">
                    <table class="table table-borderd table-striped">
                        <thead>
                            <tr>
                                <th>product ID</th>
                                <th>NAME</th>
                                <th>IMAGE</th>
                                <th>PRICE</th>
                                <th>edit</th>
                                <th>delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = " SELECT * FROM products";
                            $qrun = mysqli_query($conn, $query);
                            if (mysqli_num_rows($qrun) > 0) {
                                foreach ($qrun as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $item['product_id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $item['product_name'] ?>
                                        </td>
                                        <td>
                                            <img width="50px" height="50px"
                                                src="../assets/images/brands/<?php echo $item['product_image'] ?>" alt="img" />
                                        </td>
                                        <td>
                                            <?php echo $item['product_price'] ?>
                                        </td>
                                        <td>
                                            <a href="editpro.php?id=<?php echo $item['product_id'] ?>"
                                                class="btn btn-primary">edit</a>

                                            </form>

                                        </td>
                                        <td>
                                            <form action="deletepro.php" method="POST">
                                                <input type="hidden" name="product-id"
                                                    value="<?php echo $item['product_id'] ?>">
                                                <button type="submit" class="btn btn-danger" name="deletebtn"> delete </button>

                                        </td>


                                    </tr>
                                    <?php
                                }


                            } else {

                            }


                            ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

</div>


<?php include('includes\footer.php'); ?>