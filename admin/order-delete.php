<?php
    require 'connection.php';
    /* delete product */
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($con, "DELETE FROM `orders` WHERE orderId = $delete_id ") or die('query failed');
        if($delete_query){
           echo"
                         <script>
                             alert('order has been deleted!');
                             window.location.href='orders.php';
                         </script>
                         ";
        }else{
           echo"
                 <script>
                     alert('can,t delete!');
                     window.location.href='orders.php';
                 </script>
             ";
        };
     };

    
?>