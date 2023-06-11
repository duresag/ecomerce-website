<?php include('includes\header.php'); ?>
<div class="container my-6">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>registered users</h4>
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
                    <form action="" method="POST">
                        <div class="col-md-6">
                            <label for="">search by username</label>
                            <input type="text" name="username" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label for="">search by email</label>
                            <input type="email" name="useremail" class="form-control" placeholder="">
                        </div>
                        <br>
                        <div col-md-12>
                            <button class="btn btn-primary" type="submit" name="searchuser">search</button>
                        </div>



                    </form>

                </div>
                <?php if (isset($_POST['searchuser'])) { ?>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>user ID</th>
                                    <th>NAME</th>
                                    <th>email</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../server/connection.php');
                                if (isset($_POST['searchuser'])) {

                                    if (isset($_POST['username'])) {
                                        $username = $_POST['username'];
                                        $query = "SELECT user_id,user_name,user_email,password_hash FROM users WHERE user_name='$username'";
                                        $qrun = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($qrun) > 0) {
                                            foreach ($qrun as $item) {
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $item['user_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item['user_name'] ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $item['user_email'] ?>
                                                    </td>

                                                    <td>
                                                        <form action="deleteuser.php" method="POST">
                                                            <input type="hidden" name="user-id" value="<?php echo $item['user_id'] ?>">
                                                            <button type="submit" class="btn btn-danger" name="deletebtn"> delete </button>

                                                    </td>


                                                </tr>
                                                <?php
                                            }


                                        } else {
                                            echo " no records found";

                                        }

                                    }
                                    if (isset($_POST['useremail'])) {
                                        $useremail = $_POST['useremail'];
                                        $query = "SELECT user_id,user_name,user_email,password_hash FROM users WHERE user_email='$useremail'";
                                        $qrun = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($qrun) > 0) {
                                            foreach ($qrun as $item) {
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $item['user_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item['user_name'] ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $item['user_email'] ?>
                                                    </td>

                                                    <td>
                                                        <form action="deleteuser.php" method="POST">
                                                            <input type="hidden" name="user-id" value="<?php echo $item['user_id'] ?>">
                                                            <button type="submit" class="btn btn-danger" name="deletebtn"> delete </button>

                                                    </td>


                                                </tr>
                                                <?php
                                            }


                                        } else {
                                            echo " no records found";

                                        }

                                    }
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

</div>


<?php include('includes\footer.php'); ?>