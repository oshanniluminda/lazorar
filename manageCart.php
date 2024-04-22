<?php 
@include 'connection.php';  
session_start();
  if(isset($_SESSION['email'])){
         $emailAddres=$_SESSION['email']; 

         $query="SELECT * FROM user WHERE email='$emailAddres'";
         $result=mysqli_query($con,$query);
         $row=mysqli_fetch_assoc($result); 
         $userId=$row['user_id'];
       
  

if(isset($_POST['addcart'])){

   $pid = $_POST['proId'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['proName'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING); 
   $qty = $_POST['qty'];
   $tprice=$price*$qty;

   $select="SELECT *FROM cart WHERE proId='$pid' && user_id='$userId'";
   $result=mysqli_query($con, $select);

   if(mysqli_num_rows($result)>0){
    echo"
    <script>
        alert('item already exists');
        window.location.href='index.php';
    </script>";
   } 

   else{
    $insert = "INSERT INTO cart (user_id,proId,proName,eachprice,quantity,price) VALUES ('$userId','$pid','$name','$price','$qty','$tprice' )";
    mysqli_query($con, $insert);
    echo"
    <script>
        alert('added to cart!');
        window.location.href='index.php';
    </script>";
   }
   

} 
  } 

  else{ 
    echo"
    <script>
        alert('login first!');
        window.location.href='loginIndex.php';
    </script>";

  }



?>