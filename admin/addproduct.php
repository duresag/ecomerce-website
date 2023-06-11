<?php include('includes\header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add product</h4>
                </div>
                <div class="card-body">
                    <form action="addpro.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">product name</label>
                                <input type="text" name="product_name" class="form-control"
                                    placeholder="enter product name">
                            </div>
                            <div class="col-md-6">
                                <label for="">product catagory</label>
                                <input type="text" name="category" class="form-control"
                                    placeholder="enter product category">
                            </div>
                            <br>
                            <div class="col-md-12">
                                <label for="">product description</label>
                                <textarea name="description" id="" cols="60" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="col-md-3">
                                <label for="">image name 1</label>
                                <input type="file" name="img1">
                            </div>
                            <div class="col-md-3">
                                <label for="">image name 2</label>
                                <input type="file" name="img2">
                            </div>
                            <div class="col-md-3">
                                <label for="">image name 3</label>
                                <input type="file" name="img3">
                            </div>
                            <div class="col-md-3">
                                <label for="">image name 4</label>
                                <input type="file" name="img4">
                            </div>

                            <div class="col-md-4">


                                <label class="radio ">
                                    <input type="checkbox" name="offer">
                                    special offer
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="">price</label>
                                <input type="number" name="product_price" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4">
                                <label for="">color</label>
                                <input type="text" name="color" class="form-control" placeholder="">
                            </div>
                            <div col-md-12>
                                <button class="btn btn-primary" type="submit" name="addtoproduct">add product</button>
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

    </div>

</div>


<?php include('includes\footer.php'); ?>