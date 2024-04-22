<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Add Product</title>
</head>

<body>
    <div class="imgAddItem">
        <a href="adminPanel.php"><img src="image/logo.png" alt="Lazorar"></a>
    </div>
    <div class="containerNew">

        <div class="login-block">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1>ADD PRODUCT</h1>
                <p>Product Name*</p>
                <input type="text" name="proName" required placeholder="enter product name">
                <p>Image*</p>
                <input type="file" name="proPic" accept="image/png, image/jpg, image/jpeg" placeholder="upload image"
                    required>
                <p>Wood*</p>
                <input type="text" name="wood" required placeholder="enter wood type">
                <p>Price*</p>
                <input type="text" name="price" required placeholder="enter price">
                <p>StarNum*(1 to 5 number)</p>
                <input type="text" name="star" required placeholder="enter star number">
                <input type="submit" class="btn" value="Add product" name="addProduct">
            </form>
            <a href="itemtable.php"><input type="submit" class="btn" value="back" name="addProduct"></a>
        </div>

        <div class="adminImg">
            <img src="../image/admin.jpg" alt="">
        </div>
    </div>
</body>

</html>
<?php
require 'connection.php';

if (isset($_POST['addProduct'])) {

    $proName = $_POST['proName'];
    $proPic = $_FILES['proPic']['name'];
    $image_tmp_name = $_FILES['proPic']['tmp_name'];
    $image_folder = 'uploaded_img/' . $proPic;
    $wood = $_POST['wood'];
    $price = $_POST['price'];
    $star = $_POST['star'];


    $sql = "INSERT INTO `product`(`proName`, `proPic`,`wood`,`price`,`star`) 
       VALUES('$proName','$proPic','$wood',' $price','$star')";
    $insertQuery = mysqli_query($con, $sql);
    if ($insertQuery) {
        move_uploaded_file($image_tmp_name, $image_folder); {
            echo "
					<script>
						alert('new product add!');
						window.location.href='itemtable.php';
					</script>
					";
        }

    } else {
        echo "
					<script>
						alert('new room didn't add!');
						window.location.href='addProduct.php';
					</script>
					";
    }
}

?>