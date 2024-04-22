<?php  
session_start();
   @include 'connection.php'; 

   if(isset($_POST['login'])){
	   $email= $_POST['email'];
	   $pass=md5($_POST['password']);

	   $select="SELECT *FROM user WHERE email='$email' && password='$pass'";
	   $result=mysqli_query($con, $select); 

	   if(mysqli_num_rows($result)===1){ 
		   $row = mysqli_fetch_assoc($result); 

		           if($row['email']===$email && $row['password']===$pass){ 

                    $_SESSION['email']=$email;
			             echo"
			             <script>
				            alert('Successfully login');
				            window.location.href='index.php?email=$email';
			            </script>";
		            }  

		           else{
			             echo"
			               <script>
				              alert('Invalid Username or Password');
                              window.location.href='loginIndex.php';
			              </script>";
		               }
		 
	    } 
	   else{
		echo"
		<script>
			alert('Invalid Username or Password');
            window.location.href='loginIndex.php';
		</script>";
	   }
   } 
   
?>