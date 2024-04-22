<?php
    $con= mysqli_connect("localhost","root","","lazorar");
    if(mysqli_connect_errno()){
        die("can't connect to the database".mysqli_connect_errno());
    }
?>