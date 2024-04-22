

<?php
	 require 'connection.php';
	
	
	if(isset($_POST['update'])){
        $updateId = $_POST['updateId'];
		$status=$_POST['status'];
		
       
		   $update_query = mysqli_query($con, "UPDATE `orders` SET `status`='$status' WHERE orderId='$updateId'");
		   if($update_query){
			  
			 echo"
						<script>
							alert('order staus has been updated');
							window.location.href='orders.php';
						</script>
					";
				
		   }else{
			  echo"
						<script>
							alert('can't update');
							window.location.href='orders.php';
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
    <title>update order</title>
</head>
<body>
<a href="adminPanel.php"><img src="image/logo.png" alt="Lazorar"></a>

    <div class="login-block"> 
	<?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($con, "SELECT * FROM `orders` WHERE orderId = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
  ?>
  
    <form action="" method="POST" enctype="multipart/form-data">
    <h1>UPDATE ORDER STATUS</h1>
                
	<input type="hidden" name="updateId" value="<?php echo $fetch_edit['orderId']; ?>">
    
    <p>Order Status*</p>
    <?php echo $fetch_edit['status']; ?><br>
    <SELECT name="status" required>
                    <option value="">Select status</option>
                    <option value="preparing">preparing</option>
                    <option value="deliverd"> deliverd</option>
           
                    
                </SELECT>
 
    <input type="submit" class="btn" value="Update " name="update">
	<input type="reset" value="cancel" id="close-edit" class="btn">
</form> 
<a href="order.php"><input type="submit" class="btn" value="back" name="addProduct"></a>
<?php
		 }
        }
        }
?>