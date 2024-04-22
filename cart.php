<?php

include 'connection.php';
session_start();
if (isset($_SESSION['email'])) {
    $emailAddres = $_SESSION['email'];

    $query = "SELECT * FROM user WHERE email='$emailAddres'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $userId = $row['user_id'];

}

if (isset($_POST['delete'])) {
    $cart_id = $_POST['cart_id'];
    $delete_query = mysqli_query($con, "DELETE FROM `cart` WHERE id = $cart_id ") or die('query failed');
    echo"
    <script>
        alert('item deleted');
        window.location.href='main.php';
    </script>";
}



?>
<html>

<head>
    <title>My Cart</title>
    <link rel="stylesheet" href="cartStyle.css">
</head>

<body>
    <!--shopping cart-->
    <h2 class="cart-title"> MY CART</h2>
    <hr class="hr-cart">
    <div class="cart">

        <div class="cart-content">
            <div class="cart-box">
                <table border="3" width="100%">
                    <thead width="100%">
                        <tr>

                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        @include 'connection.php';
                        $gtotal = 0;
                        $select = "SELECT *FROM cart WHERE user_id='$userId'";
                        $result = mysqli_query($con, $select);
                        if (!$result) {
                            die("invalid query:" . mysqli_connect_error());
                        }
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <form action="" method="post" class="box">
                                <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                <tr>

                                    <td>
                                        <?php echo $row['proName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['quantity']; ?>
                                    </td>

                                    <td>
                                        <?php $total = ($row['price']);
                                        echo $total; ?>
                                    </td>
                                    <td><input type="submit" value="Delete Item" class="delete-btn" name="delete">
                            </form>
                            </td>
                            </tr>

                            <?php
                            $gtotal += $total;

                        } ?>

                    </tbody>
                </table>
                <div class="cart-total">
                    <p>Grand Total : <span>RS
                            <?php echo $gtotal; ?>/-
                        </span></p>
                    <a href="index.php" class="option-btn continueBtn">Continue Shopping</a>
                    <?php
                    if ($gtotal > 1) { ?>
                        <a href="checkout.php" class="option-btn checkBtn">Check Out</a>
                        <?php
                    } ?>

                </div>


            </div>


        </div>
        <hr>
        <div class="cartImg">
            <img src="image/crt.png" alt="">
        </div>
    </div>

</body>

</html>