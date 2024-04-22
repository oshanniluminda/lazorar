<?php
require 'connection.php';


if (isset($_POST['update'])) {
	$updateId = $_POST['updateId'];
	$updateProName = $_POST['updateProName'];
	$updateProPic = $_FILES['updateImage']['name'];
	$updateImage_tmp_name = $_FILES['updateImage']['tmp_name'];
	$updateImage_folder = 'uploaded_img/' . $updateProPic;
	$updateWood = $_POST['updateWood'];
	$updatePrice = $_POST['updatePrice'];
	$updateStar = $_POST['updateStar'];

	$update_query = mysqli_query($con, "UPDATE `product` 
		   SET `ProName`='$updateProName',`proPic`='$updateProPic',`wood`='$updateWood',`price`='$updatePrice',
           `star`='$updateStar'
		   WHERE proId  = '$updateId'");

	if ($update_query) {
		move_uploaded_file($updateImage_tmp_name, $updateImage_folder);
		echo "
						<script>
							alert('product has been updated');
							window.location.href='itemtable.php';
						</script>
					";

	} else {
		echo "
						<script>
							alert('new !');
							window.location.href='itemtable.php';
						</script>
					";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="form.css">
	<title>Product</title>
</head>

<body>
	<div class="imgAddItem">
		<a href="adminPanel.php"><img src="image/logo.png" alt="Lazorar"></a>
	</div>


	<div class="login-block">
		<?php

		if (isset($_GET['edit'])) {
			$edit_id = $_GET['edit'];
			$edit_query = mysqli_query($con, "SELECT * FROM `product` WHERE proId = $edit_id");
			if (mysqli_num_rows($edit_query) > 0) {
				while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
					?>
					<form action="" method="POST" enctype="multipart/form-data">
						<h1>EDIT PRODUCT</h1>
						<p>Product Name*</p>
						<input type="hidden" name="updateId" value="<?php echo $fetch_edit['proId']; ?>">
						<input type="text" name="updateProName" required value="<?php echo $fetch_edit['proName']; ?>">
						<p>Image*</p>
						<img src="uploaded_img/<?php echo $fetch_edit['proPic']; ?>" height="200" alt="">
						<input type="file" name="updateImage" accept="image/png, image/jpg, image/jpeg">
						<p>Wood*</p>
						<input type="text" name="updateWood" required value="<?php echo $fetch_edit['wood']; ?>">
						<p>Price*</p>
						<input type="text" name="updatePrice" required value="<?php echo $fetch_edit['price']; ?>">
						<p>StarNum*</p>
						<input type="text" name="updateStar" required value="<?php echo $fetch_edit['star']; ?>">
						<input type="submit" class="btn" value="Update product" name="update">
						<input type="reset" value="cancel" id="close-edit" class="btn">
					</form>
					<a href="itemtable.php"><input type="submit" class="btn" value="back" name="addProduct"></a>
					<?php
				}
			}
		}
		?>