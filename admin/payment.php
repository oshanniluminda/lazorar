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
    <div id="wrapper1">
      <h1>Income</h1>

      <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><span>Payment id</span></th>
            <th><span>Order_id</span></th>
            <th><span>User id</span></th>
            <th><span>Total</span></th>
            <th><span>Action</span></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php

            require 'connection.php';
            $select_pay = mysqli_query($con, "SELECT * FROM `payments`");
            if (mysqli_num_rows($select_pay) > 0) {
              while ($row = mysqli_fetch_assoc($select_pay)) {
                ?>

              <tr>


                <td>
                  <?php echo $row['paymentId']; ?>
                </td>

                <td>
                  <?php echo $row['orderId']; ?>
                </td>
                <td>
                  <?php echo $row['user_id']; ?>
                </td>
                <td>
                  <?php echo $row['totalBill']; ?>
                </td>

                <td>
                  <button><a href="pay-delete.php?delete=<?php echo $row['paymentId']; ?>">Delete</button></a> <br>

                </td>
              </tr>
              <?php
              }
              ;

            }
            ;
            ?>
          </tr>
        </tbody>
      </table>
    </div>


  </div>
</body>

</html>