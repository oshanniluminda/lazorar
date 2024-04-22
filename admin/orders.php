<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
  <title>Orders</title>
</head>

<body>
  <div class="imgAddItem">
    <a href="adminPanel.php"><img src="image/logo.png" alt="Lazorar"></a>
  </div>
  <div id="wrapper">
    <h1>Orders Table</h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th><span>order id</span></th>
          <th><span>user id</span></th>
          <th><span>Name</span></th>
          <th><span>phone num</span></th>
          <th><span>Address</span></th>
          <th><span>Items</span></th>
          <th><span>order date</span></th>
          <th><span>status</span></th>
          <th><span>Action</span></th>
        </tr>
      </thead>
      <tbody>
        <?php

        require 'connection.php';
        $select_order = mysqli_query($con, "SELECT * FROM `orders`");
        if (mysqli_num_rows($select_order) > 0) {
          while ($row = mysqli_fetch_assoc($select_order)) {
            ?>

            <tr>


              <td>
                <?php echo $row['orderId']; ?>
              </td>
              <td>
                <?php echo $row['user_id']; ?>
              </td>
              <td>
                <?php echo $row['name']; ?>
              </td>
              <td>
                <?php echo $row['number']; ?>
              </td>

              <td>
                <?php echo $row['address']; ?>
              </td>
              <td>
                <?php echo $row['totalProduct']; ?>
              </td>

              <td>
                <?php echo $row['orderDate']; ?>
              </td>
              <td>
                <?php echo $row['status']; ?>
              </td>
              <td>
                <a href="order-delete.php?delete=<?php echo $row['orderId']; ?>"> <button
                    class="btnDelete">Delete</a></button> <br>
                <a href="order-update.php?edit=<?php echo $row['orderId']; ?>"> <button>update</a></button> <br>
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
</body>

</html>