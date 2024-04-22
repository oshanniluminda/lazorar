<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">

                        <span class="title1">L A Z O R A R</span>
                    </a>
                </li>

                <li>
                    <a href="adminPanel.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="usertable.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="itemtable.php">
                        <span class="icon">
                            <ion-icon name="pricetags-outline"></ion-icon>
                        </span>
                        <span class="title">Items</span>
                    </a>
                </li>

                <li>
                    <a href="orders.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li>
                    <a href="payment.php">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="title">Income</span>
                    </a>
                </li>
                <li>
                    <a href="adminLogout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <?php
                        require 'connection.php';

                        $sql = 'SELECT user_id FROM user ORDER BY user_id';
                        $query = mysqli_query($con, $sql);
                        $row = mysqli_num_rows($query);

                        ?>
                        <div class="numbers">
                            <?php echo $row ?>
                        </div>
                        <div class="cardName">Customer</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                        require 'connection.php';

                        $sql = 'SELECT orderId FROM orders ORDER BY orderId';
                        $query = mysqli_query($con, $sql);
                        $row = mysqli_num_rows($query);

                        ?>
                        <div class="numbers">
                            <?php echo $row ?>
                        </div>
                        <div class="cardName">Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>


                <div class="card">
                    <div>
                        <?php
                        // income display
                        $total_income = 0;
                        $sql = mysqli_query($con, "SELECT totalBill FROM payments");
                        while ($result = mysqli_fetch_array($sql)) {
                            $total_income += $result['totalBill'];

                        }

                        ?>
                        <div class="numbers">
                            <?php echo 'Rs.' . $total_income . '/-' . '</h1>'; ?>
                        </div>
                        <div class="cardName">Income</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="orders.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Order id</td>
                                <td>User id</td>
                                <td>Name</td>
                                <td>phone Num</td>
                                <td>address</td>
                                <td>Items</td>
                                <td>date</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            require 'connection.php';
                            $select_order = mysqli_query($con, "SELECT * FROM `orders` ORDER BY orderId DESC LIMIT 5");
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
                                    </tr>
                                    <?php
                                }
                            } ?>
                        </tbody>
                    </table>

                </div>



            </div>
        </div>
    </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="admin.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>