<?php 
   @include 'connection.php'; 

   if(isset($_POST['signUp'])){
	   $userName= $_POST['username'];
	   $email= $_POST['email'];
	   $pass=md5($_POST['password']);

	   $select="SELECT *FROM user WHERE email='$email' && password='$pass'";
	   $result=mysqli_query($con, $select);

	   if(mysqli_num_rows($result)>0){
		echo"
		<script>
			alert('User already exists');
			window.location.href='loginIndex.php';
		</script>";
	   } 

	   else{
		$insert ="INSERT INTO `user`( `username`, `email`, `password`) VALUES ('$userName','$email','$pass')";
		mysqli_query($con, $insert);
		echo"
		<script>
			alert('Successfully registered');
			window.location.href='loginIndex.php';
		</script>";
	   }

   }
?>