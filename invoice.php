<?php 
session_start();
   require 'connection.php'; 
   $invoiceNo=$_GET['id']; 

   $query="SELECT * FROM orders WHERE orderId='$invoiceNo'";
   $result=mysqli_query($con,$query);
   $row=mysqli_fetch_assoc($result);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{ 
            margin-top:70px;
            width: 60%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #088178;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        } 
        button{
            display: inline;
	        width: 45%;
	        height: 50px;
	       border-radius: 25px;
	       outline: none;
	       border: none;
	      background-color:#088178 ;
	      background-size: 50%;
	      font-size: 1.2rem;
	      color: #fff;
	       font-family: 'Poppins', sans-serif;
	      text-transform: uppercase;
	     margin: 0.5rem 0;
	      cursor: pointer;
	     transition: .10s;
        } 

        .btn{
            display: inline;
            float: right;
	        width: 45%;
	        height: 50px;
	       border-radius: 25px;
	       outline: none;
	       border: none;
	      background-color:#088178 ;
	      background-size: 50%;
	      font-size: 1.2rem;
	      color: #fff;
	       font-family: 'Poppins', sans-serif;
	      text-transform: uppercase;
	     margin: 0.5rem 0;
         margin-left: 0.5rem;
	      cursor: pointer;
	     transition: .10s;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Lazorar</h1>
                </div>
                
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: <?php echo $invoiceNo;?></h2>
                    <p class="sub-heading">Order Date: <?php echo $row['orderDate'];?> </p>
                    <p class="sub-heading">Email Address: <?php echo $row['email'];?>  </p>
                </div>
                <div class="col-6">
                     <p class="sub-heading"></p>
                     <p class="sub-heading"></p>
                    <p class="sub-heading">Name: <?php echo $row['name'];?>  </p>
                    <p class="sub-heading">Address:<?php echo $row['address'];?>   </p>
                    <p class="sub-heading">Phone Number: <?php echo $row['number'];?>   </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <p class="sub-heading"> Total Items :<?php echo  $row['totalProduct'];?> </p>
            <p class="sub-heading"> Total Price :<?php echo "Rs. " . ($row['totalPrice']-400);?> </p>
            <p class="sub-heading"> Delivery Charges:<?php echo "Rs. " .  400;?> </p>
            <p class="sub-heading"> Grand Total :<?php echo "Rs. " . ($row['totalPrice']);?> </p>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2023 - Lazorar. All rights reserved. 
                
            </p>
        </div>      
        <div class="body-section">
        <button onClick="window.print()"  > click to print </button>
       <a href="index.php"> <button  class="btn"  > home </button></a>
        </div>    
    </div>      

</body>
</html>