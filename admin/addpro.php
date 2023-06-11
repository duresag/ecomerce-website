<?php
include('../server/connection.php');
if (isset($_POST['addtoproduct'])) {
    $name = $_POST['product_name'];
    $description = $_POST['description'];
    $catagory = $_POST['category'];

    $offer = isset($_POST['offer']) ? 1 : 0;
    $price = $_POST['product_price'];
    $color = $_POST['color'];
    $location = "../assets/images/brands/";

    $imgname = $_FILES['img1']['name'];
    $tempimage = $_FILES['img1']['tmp_name'];
    if (isset($imgname)) {
        if (!empty($imgname)) {
            move_uploaded_file($tempimage, $location . $imgname);
        }
    }
    $imgname2 = $_FILES['img2']['name'];
    $tempimage2 = $_FILES['img2']['tmp_name'];
    if (isset($imgname2)) {
        if (!empty($imgname2)) {
            move_uploaded_file($tempimage2, $location . $imgname2);
        }
    }
    $imgname3 = $_FILES['img3']['name'];
    $tempimage3 = $_FILES['img3']['tmp_name'];
    if (isset($imgname3)) {
        if (!empty($imgname3)) {
            move_uploaded_file($tempimage3, $location . $imgname3);
        }
    }
    $imgname4 = $_FILES['img4']['name'];
    $tempimage4 = $_FILES['img4']['tmp_name'];
    if (isset($imgname4)) {
        if (!empty($imgname)) {
            move_uploaded_file($tempimage4, $location . $imgname4);
        }
    }




    $sql = "INSERT into products(product_name,product_description,product_category,product_image,product_image2,product_image3,product_image4,product_price,product_special_offer,product_color)
VALUES('$name','$description','$catagory','$imgname','$imgname2','$imgname3','$imgname4','$price','$offer','$color')";

    $qrun = mysqli_query($conn, $sql);
    if ($qrun) {
        header('location:addproduct.php?message=product sucsessfuly added');


    } else {
        header('location:addproduct.php?error=something went wrong');

    }




} elseif (isset($_POST['updateproduct'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $img1 = $_POST['productimg1'];
    $img2 = $_POST['productimg2'];
    $img3 = $_POST['productimg3'];
    $img4 = $_POST['productimg4'];
    $offer = isset($_POST['offer']) ? 1 : 0;
    $price = $_POST['product_price'];
    $color = $_POST['color'];

    $updatequery = 'UPDATE products
 SET product_name="' . $name . '",
 product_description="' . $description . '",
 product_category="' . $category . '",
 product_image="' . $img1 . '",
 product_image2="' . $img2 . '",
 product_image3="' . $img3 . '",
 product_image4="' . $img4 . '",
 product_price="' . $price . '",
 product_special_offer="' . $offer . '",
 product_color="' . $color . '" WHERE product_id="' . $id . '"';
    $qrun = mysqli_query($conn, $updatequery);
    if ($qrun) {
        header('location:products.php?message=update sucssesful');


    } else {
        header('location:products.php?error=something went wrong');

    }


} else {
    header('location:index.php');
}
?>