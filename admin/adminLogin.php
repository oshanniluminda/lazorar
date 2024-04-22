<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="adminLogin.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="screen">
		
            <div class="screen__content">
			
                <form class="login" method="POST">
				<h1 style='color:black'>Admin Login</h1>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="User name " name="adminName">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="adminPassword">
                    </div>
                    
                        <input type="submit" value="Login" class="button login__submit" name="btnlogin" >
                    				
                </form>
                
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    <?php
        require 'connection.php';
			if(isset($_POST['btnlogin']))
			{
                
				$sql="SELECT * FROM `adminLogin` WHERE `adminName`='$_POST[adminName]' AND `adminPassword`='$_POST[adminPassword]'";
				$query=mysqli_query($con,$sql);
				if(mysqli_num_rows($query)==1)
				{
					session_start();
					$_SESSION['AdminLoginId']=$_POST['AdminName'];
					header("location: adminPanel.php");
					
				}else{
                    echo"
					
                      
						<script>
							alert('Invalid user name or password');
							window.location.href='adminLogin.php';
						</script>
					";
				
        
       
				}
			}
		?>
</body>
</html>