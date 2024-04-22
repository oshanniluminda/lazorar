<?php
session_start();
include 'connection.php';

if (isset($_SESSION['email'])) {
   $emailAddres = $_SESSION['email'];

   $query = "SELECT * FROM user WHERE email='$emailAddres'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
   $userId = $row['user_id'];

}


function unique_id()
{
   $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $rand = array();
   $length = strlen($str) - 1;
   for ($i = 0; $i < 20; $i++) {
      $n = mt_rand(0, $length);
      $rand[] = $str[$n];
   }
   return implode($rand);
}

if (isset($_POST['order'])) {

   $orderCode = $_POST['orderCode'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $select = "SELECT *FROM cart";
   $result = mysqli_query($con, $select);

   if (mysqli_num_rows($result) > 0) {
      $insert = "INSERT INTO `orders`(`user_id`, `orderCode`, `name`, `number`, `email`, `address`, `totalProduct`, `totalPrice`) VALUES ('$userId','$orderCode','$name','$number','$email','$address','$total_products','$total_price')";
      mysqli_query($con, $insert);

      $delete_query = mysqli_query($con, "DELETE FROM `cart` WHERE user_id='$userId' ") or die('query failed');
      echo "
    <script>
        alert('order placed successfully!');
        window.location.href='paymentDetails.php?';
    </script>";
   } else {

   }


}



?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Check Out</title>
   <link rel="stylesheet" href="checkOutStyle.css">
</head>

<body>

   <form action="" method="POST" name="checkout" onsubmit="return check()">


      <div class="mainOne">
         <div class="flex">
            <h3>Place Your Orders</h3>
            <div class="inputBox">
               <input type="hidden" name="orderCode" class="box" maxlength="20" value="<?php echo uniqid(); ?>">
            </div>
            <div class="inputBox">
               <span>Your Name &nbsp&nbsp&nbsp&nbsp:</span>
               &nbsp&nbsp<input type="text" name="name" placeholder="Enter your name" class="box" maxlength="20"
                  required>
                  <div class="error">
                        <p id="result1"></p>
                    </div>
            </div>
            <div class="inputBox">
               <span>Your Phone num :</span>
               &nbsp&nbsp<input type="text" name="number" placeholder="Enter your number" class="box" 
                   required>
                  <div class="error">
                        <p id="result2"></p>
                  </div>
               </div>
            <div class="inputBox">
               <span>Your Email &nbsp&nbsp&nbsp&nbsp:</span>
               &nbsp&nbsp<input type="email" name="email" placeholder="Enter your email" class="box" maxlength="50"
                  required>
            </div>
            <div class="inputBox">
               <span>Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</span>
               &nbsp&nbsp<input type="text" name="address" placeholder="Enter delivery address" class="box"
                  maxlength="50" required>
            </div>

            <h3 class="itemDetail">Item Details</h3>

            <?php
            $gtotal = 0;
            $delivery = 400;
            $cart_items[] = '';
            $select = "SELECT *FROM cart WHERE user_id='$userId' ";
            $result = mysqli_query($con, $select);
            if (!$result) {
               die("invalid query:" . mysqli_connect_error());
            }
            while ($row = mysqli_fetch_assoc($result)) {

               $cart_items[] = $row['proName'] . ' (' . $row['eachprice'] . ' x ' . $row['quantity'] . ') + ';
               $total_products = implode($cart_items);
               $gtotal += ($row['price']);
               ?>
               <p>
                  <?php echo $row['proName']; ?> <span>(
                     <?php echo 'Rs ' . $row['eachprice'] . '/- x ' . $row['quantity']; ?>)
                  </span>
               </p>
               <?php
            } ?>
            <div class="itemName">
               <input type="hidden" name="total_products" value="<?php echo $total_products; ?>">
               <input type="hidden" name="total_price" value="<?php echo $gtotal + $delivery; ?>" value="">
            </div>
            <div class="grand-total">Total : <span>Rs
                  <?php echo $gtotal; ?>/-
               </span></div>
            <div class="grand-total">Delivery Charges : <span>Rs
                  <?php echo $delivery; ?>/-
               </span></div>
            <div class="grand-total g-tot">Grand Total : <span>Rs
                  <?php echo $gtotal + $delivery; ?>/-
               </span></div>
            <div class="btn">
               <input type="submit" name="order" value="Continue">
            </div>
         </div>

         <div class="cartImg">
            <img src="image/pay.jpg" alt="">
         </div>
      </div>
   </form>
   <?php
   if (isset($_REQUEST['order'])) {
      $_SESSION['code'] = $_POST['orderCode'];
      $_SESSION['total'] = $_POST['total_price'];
      $_SESSION['product'] = $_POST['total_products'];
   }
   ?>
   <script>
      function check(){
         if(!document.checkout.name.value.match(/^[A-Za-z" "]+$/)){
        document.getElementById("result1").innerHTML="Enter the correct name";
        return false;
      }
      else if(isNaN(document.checkout.number.value)){
         document.getElementById("result2").innerHTML="Enter only numeric values";
         return false;
      }
      else if(document.checkout.number.value.length!=10){
         document.getElementById("result2").innerHTML="Enter 10 numerical values";
         return false;
         }
   }
   </script>
</body>

</html>