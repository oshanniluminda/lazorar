<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
  <title>Item Details</title>
</head>

<body>
  <div class="imgAddItem">
    <a href="adminPanel.php"><img src="image/logo.png" alt="Lazorar"></a>
  </div>
  <p class="add">To Add Product Click Me 👇</p>
  <div class="addProBtn">
    <button><a href="addproductform.php" class="btnAddProduct"> add Product </a></button>
  </div>
  <div id="wrapper">
    <h1>Items Table</h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th><span>P_Name</span></th>
          <th><span>P_Image</span></th>
          <th><span>Wood</span></th>
          <th><span>Price</span></th>
          <th><span>StarNumber</span></th>
          <th><span>Action</span></th>
        </tr>
      </thead>
      <tbody>
        <?php

        require 'connection.php';
        $select_products = mysqli_query($con, "SELECT * FROM `product`");
        if (mysqli_num_rows($select_products) > 0) {
          while ($row = mysqli_fetch_assoc($select_products)) {
            ?>

            <tr>


              <td>
                <?php echo $row['proName']; ?>
              </td>
              <td><img src="uploaded_img/<?php echo $row['proPic']; ?>" height="100" alt=""></td>
              <td>
                <?php echo $row['wood']; ?>
              </td>
              <td>
                <?php echo $row['price']; ?>
              </td>
              <td>
                <?php echo $row['star']; ?>
              </td>

              <td>
                <button class="btnDelete"><a href="pro-delete.php?delete=<?php echo $row['proId']; ?>">Delete</button></a>
                <br>
                <button class="btnUpdate"><a href="pro-update.php?edit=<?php echo $row['proId']; ?>"> Update</button></a>
              </td>
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