

<?php
	 require 'connection.php';
	
	
	if(isset($_POST['update'])){
        $updateId = $_POST['updateId'];
		$updateProName=$_POST['updateProName'];
		$updateProPic = $_FILES['updateImage']['name'];
		$updateImage_tmp_name = $_FILES['updateImage']['tmp_name'];
		$updateImage_folder = 'uploaded_img/'.$updateProPic;
		$updateWood=$_POST['updateWood'];
		$updatePrice=$_POST['updatePrice'];
        $updateStar=$_POST['updateStar'];
		   
		   $update_query = mysqli_query($con, "UPDATE `product` 
		   SET `ProName`='$updateProName',`proPic`='$updateProPic',`wood`='$updateWood',`price`='$updatePrice',
           `star`='$updateStar'
		   WHERE proId  = '$updateId'");

		   if($update_query){
			  move_uploaded_file($updateImage_tmp_name, $updateImage_folder);
			 echo"
						<script>
							alert('product has been updated');
							window.location.href='adminProducts.php';
						</script>
					";
				
		   }else{
			  echo"
						<script>
							alert('new !');
							window.location.href='room.php';
						</script>
					";
			}
	}
		
?>