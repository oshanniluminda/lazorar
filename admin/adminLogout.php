<?php
  session_start();
  unset($_SESSION['AdminLoginId']);  
  session_destroy();
?> 
<script type="text/javascript">
     window.location="adminLogin.php";
</script>