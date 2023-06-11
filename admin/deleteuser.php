<?Php
include('../server/connection.php');
if (isset($_POST['deletebtn'])) {
    $id = $_POST['user-id'];
    $sql = "DELETE FROM users WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location:customers.php?message=succesfully deleted the user');
    } else {
        header('location:customers.php?error=unable deleted the user');
    }


}

?>