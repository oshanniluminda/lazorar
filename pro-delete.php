<?php
    require 'connection.php';
    /* delete product */
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($con, "DELETE FROM `product` WHERE proId = $delete_id ") or die('query failed');
        if($delete_query){
           echo"
                         <script>
                             alert('product has been deleted!');
                             window.location.href='adminItems.php';
                         </script>
                         ";
        }else{
           echo"
                 <script>
                     alert('can,t delete!');
                     window.location.href='adminItemss.php';
                 </script>
             ";
        };
     };
?>