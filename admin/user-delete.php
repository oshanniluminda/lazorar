<?php
require 'connection.php';
     /*delete user */
     if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($con, "DELETE FROM `user` WHERE user_id = $delete_id ") or die('query failed');
        if($delete_query){
           echo"
                         <script>
                             alert('user has been deleted!');
                             window.location.href='usertable.php';
                         </script>
                         ";
        }else{
           echo"
                 <script>
                     alert('can,t delete!');
                     window.location.href='usertable.php';
                 </script>
             ";
        };
     };
?>