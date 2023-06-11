<?Php
include('../server/connection.php');
if (isset($_POST['deletebtn'])) {
    $id = $_POST['product-id'];
    $sql = "DELETE FROM products WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location:products.php?message=succesfully deleted the product');
    } else {
        header('location:products.php?error=unable deleted the product');
    }


}

?>