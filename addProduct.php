<html>

<head>
    <link rel="stylesheet" href="addProductStyle.css">
    <title>Add New Product</title>

</head>


<body>

    <h2> Add New Product </h2>
    </div>
    <div class="add-pro-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="first-row">
                <div class="product-code">
                    <p>Product Name</p>
                    <div class="input-code">
                        <input type="text" name="proName" required>
                    </div>
                </div>
            </div>

            <div class="third-row">
                <div class="image">
                    <p>Image</p>
                    <div class="input-img">
                        <input type="file" name="proPic" accept="image/png, image/jpg, image/jpeg" required>
                    </div>
                </div>
            </div>

            <div class="fourth-row">
                <div class="description">
                    <p>Wood</p>
                    <div class="input-des">
                        <input type="text" name="wood" required>
                    </div>
                </div>
            </div>
            <div class="fifth-row">
                <div class="start-price">
                    <p>Price</p>
                    <div class="input-price">
                        <input type="text" name="price">
                    </div>
                </div>
            </div>
            <div class="sixth-row">
                <div class="star">
                    <p>starNum</p>
                    <div class="input-price">
                        <input type="text" name="star">
                    </div>
                </div>
            </div>
            <div class="button ">
                <input type="submit" class="btn" value="Add product" name="addProduct">
            </div>
        </form>


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
						window.location.href='adminItems.php';
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