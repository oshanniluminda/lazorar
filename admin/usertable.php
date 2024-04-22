<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
  <title>Document</title>
</head>

<body>
  <div class="imgAddItem">
    <a href="adminPanel.php"><img src="image/logo.png" alt="Lazorar"></a>
  </div>
  <div class="containerNew">
    <div id="wrapper">
      <h1>Registered User Table</h1>

      <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><span>Username</span></th>
            <th><span>Email</span></th>
            <th><span>Regitered date</span></th>
            <th><span>Action</span></th>
          </tr>
        </thead>
        <tbody>
          <?php

          require 'connection.php';
          $select_products = mysqli_query($con, "SELECT * FROM `user`");
          if (mysqli_num_rows($select_products) > 0) {
            while ($row = mysqli_fetch_assoc($select_products)) {
              ?>

              <tr>


                <td>
                  <?php echo $row['username']; ?>
                </td>
                <td>
                  <?php echo $row['email']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>

                <td>
                  <a href="user-delete.php?delete=<?php echo $row['user_id']; ?>"> <button
                      class="btnDel">Delete</a></button>
                  <br>

              </tr>
              <?php
            }
            ;

          }
          ;
          ?>
        </tbody>
      </table>
    </div>
    <div class="adminImg">
      <img src="../image/reg3.png" alt="">
    </div>
  </div>
</body>

</html>