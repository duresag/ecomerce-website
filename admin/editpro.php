<?php include('includes\header.php');
include('../server/connection.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql1 = 'SELECT * FROM products WHERE product_id=?';
                $stmt = $conn->prepare($sql1);
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $result = $stmt->get_result();


                if (mysqli_num_rows($result) <= 1) {
                    while ($row = $result->fetch_assoc()) { ?>


                        <div class="card">
                            <div class="card-header">
                                <h4>edit product</h4>
                            </div>
                            <div class="card-body">
                                <form action="addpro.php" method="POST">

                                    <div class="row">
                                        <input type="hidden" value="<?php echo $row['product_id'] ?>" name="product_id">
                                        <div class="col-md-6">
                                            <label for="">product name</label>
                                            <input type="text" value="<?php echo $row['product_name'] ?>" name="product_name"
                                                class="form-control" placeholder="">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">product catagory</label>
                                            <input type="text" value="<?php echo $row['product_category'] ?> " name=" category"
                                                class="form-control" placeholder="enter product category">
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <label for="">product description</label>
                                            <textarea cols=" 60" rows="4" class="form-control"
                                                name="description"><?php echo $row['product_description'] ?></textarea>


                                        </div>

                                        <div class="col-md-3">
                                            <label for="">image name 1</label>
                                            <input type="text" name="productimg1" value="<?php echo $row['product_image']; ?>"
                                                class=" form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">image name 2</label>
                                            <input type="text" name="productimg2" value="<?php echo $row['product_image2']; ?>"
                                                class=" form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">image name 3</label>
                                            <input type="text" name="productimg3" value="<?php echo $row['product_image3']; ?>"
                                                class=" form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">image name 4</label>
                                            <input type="text" name="productimg4" value="<?php echo $row['product_image4']; ?>"
                                                class=" form-control" placeholder="">
                                        </div>
                                        <div class="col-md-4">


                                            <label class="radio ">
                                                <input type="checkbox" name="offer">
                                                special offer
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">price</label>
                                            <input type="number" name="product_price" value="<?php echo $row['product_price']; ?>"
                                                class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">color</label>
                                            <input type="text" name="color" value="<?php echo $row['product_color']; ?>"
                                                class="form-control" placeholder="">
                                        </div>
                                        <div col-md-12>
                                            <button class="btn btn-primary" type="submit" name="updateproduct">update</button>
                                        </div>

                                    </div>

                                </form>

                                <p style="color: red;">
                                    <?php if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    } ?>
                                </p>
                                <p style="color: green;">
                                    <?php if (isset($_GET['message'])) {
                                        echo $_GET['message'];
                                    } ?>
                                </p>
                            </div>


                        </div>
                    </div>

                    <?php

                    }
                }






            } else {
                echo "id missing from url";
            }
            ?>


    </div>

</div>


<?php include('includes\footer.php'); ?>