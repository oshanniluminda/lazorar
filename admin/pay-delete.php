<?php
    require 'connection.php';
    /* delete product */
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($con, "DELETE FROM `payments` WHERE paymentId = $delete_id ") or die('query failed');
        if($delete_query){
           echo"
                         <script>
                             alert('payment has been deleted!');
                             window.location.href='payment.php';
                         </script>
                         ";
        }else{
           echo"
                 <script>
                     alert('can,t delete!');
                     window.location.href='payment.php';
                 </script>
             ";
        };
     };

    
?>