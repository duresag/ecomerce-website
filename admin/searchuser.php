<?Php
include('../server/connection.php');

if (isset($_POST['searchuser'])) {

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $sql = "SELECT user_id,user_name,user_email,password_hash FROM users WHERE user_name='$username'";
        $qrun = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($qrun);



    }



}

?>