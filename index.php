<?php
require 'connection.php';
session_start();
if (isset($_SESSION['email'])) {
    $emailAddres = $_SESSION['email'];

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Lazorar</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">-

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <section id="header">
        <a href="#"><img src="image/logo.png" alt="Lazorar"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="indexPagination.php">Product</a></li>
                <li><a href="blog/blogIndex.html">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-cart cartOne"></i></a></li>

                <?php } ?>
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <li id="lg-bag"> <a href="logout.php"><i class="fas fa-sign-out logOne"></i></a></li>
                <?php } ?>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>
        </div>

        <div id="mobile">
            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
            <?php
            if (isset($_SESSION['email'])) {
                ?>
                <a href="cart.html"><i class="fas fa-user"></i></a>
            <?php } ?>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="hero">
        <h4>Trade In Offer</h4>
        <h2>Super Value Deals</h2>
        <h1>On All Products</h1>
        <p>Save More With Coupons & up to 70% Off !!!</p>
        <a href="loginIndex.php"><button class="btnLog">Login</button></a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="image/deli.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="image/time.jpg" alt="">
            <h6>24 / 7 Service</h6>
        </div>
        <div class="fe-box">
            <img src="image/cart.png" alt="">
            <h6>Useful Cart</h6>
        </div>
        <div class="fe-box">
            <img src="image/sale.png" alt="">
            <h6>Sale Offer</h6>
        </div>
        <div class="fe-box">
            <img src="image/cart1.png" alt="">
            <h6>Order Online</h6>
        </div>
        <div class="fe-box">
            <img src="image/save.png" alt="">
            <h6>Save Money</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Discover the beauty of our Exotic Lazor Wood Collection</p>

        <div class="pro-container">

            <?php
            $select_pro = mysqli_query($con, "SELECT * FROM `product`ORDER BY proId DESC LIMIT 8");
            if (mysqli_num_rows($select_pro) > 0) {
                while ($fetch_pro = mysqli_fetch_assoc($select_pro)) {
                    ?>

                    <div class="pro">
                        <form method="POST" action="manageCart.php">
                            <img src="admin/uploaded_img/<?php echo $fetch_pro['proPic']; ?>">
                            <div class="des">
                                <span>
                                    <?php echo $fetch_pro['wood']; ?>
                                </span>
                                <h5>
                                    <?php echo $fetch_pro['proName']; ?>
                                </h5>
                                <div class="star">
                                    <?php
                                    $count = 1;
                                    while ($count <= 5) {
                                        if ($fetch_pro['star'] >= $count) {
                                            ?>
                                            <i class="fas fa-star"></i>
                                            <?php
                                        } else {
                                            ?>

                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>

                                </div>
                                <h4>Each Price</h4>
                                <h4>Rs.
                                    <?php echo $fetch_pro['price']; ?>
                                </h4>
                                <h4><input type="number" name="qty" class="qtyInput" min="1" max="99" placeholder="Quantity"
                                        required></h4>

                            </div>
                            <input type="hidden" name="proId" value="<?php echo $fetch_pro['proId']; ?>">
                            <input type="hidden" name="proName" value="<?php echo $fetch_pro['proName']; ?>">
                            <input type="hidden" name="price" value="<?php echo $fetch_pro['price']; ?>">
                            <button type="submit" name="addcart"><i class="fas fa-shopping-cart cart"></i></button>

                        </form>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Hurry Up</h4>
        <h2>Up to <span>70% off </span>All Products & Accessories</h2>
        <button class="normal"><a href="indexPagination.php">Explore More</a></button>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Get ready to make a statement with our newest collection</p>
        <div class="pro-container">
            <?php
            $select_pro = mysqli_query($con, "SELECT * FROM `product`ORDER BY proId DESC LIMIT 4");
            if (mysqli_num_rows($select_pro) > 0) {
                while ($fetch_pro = mysqli_fetch_assoc($select_pro)) {
                    ?>

                    <div class="pro">
                        <form method="POST" action="manageCart.php">
                            <img class="upImg" src="admin/uploaded_img/<?php echo $fetch_pro['proPic']; ?>">
                            <div class="des">
                                <span>
                                    <?php echo $fetch_pro['wood']; ?>
                                </span>
                                <h5 class="proName">
                                    <?php echo $fetch_pro['proName']; ?>
                                </h5>
                                <div class="star">
                                    <?php
                                    $count = 1;
                                    while ($count <= 5) {
                                        if ($fetch_pro['star'] >= $count) {
                                            ?>
                                            <i class="fas fa-star"></i>
                                            <?php

                                        }
                                        $count++;
                                    }
                                    ?>

                                </div>
                                <h4 class="each">Each Price</h4>
                                <h4 class="priceCo">Rs.
                                    <?php echo $fetch_pro['price']; ?>
                                </h4>
                                <h4><input type="number" name="qty" class="qtyInput" min="1" max="99" placeholder="Quantity"
                                        require>
                                </h4>

                            </div>
                            <input type="hidden" name="proId" value="<?php echo $fetch_pro['proId']; ?>">
                            <input type="hidden" name="proName" value="<?php echo $fetch_pro['proName']; ?>">
                            <input type="hidden" name="price" value="<?php echo $fetch_pro['price']; ?>">
                            <button type="submit" name="addcart"><i class="fas fa-shopping-cart cart"></i></button>

                        </form>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box banner-box6">


            <h2></h2>
            <span></span>

        </div>
        <div class="banner-box banner-box1">
            <h4>Superb Chance</h4>
            <h2>Buy 1 get 1 free</h2>
            <span>The Best Classic items is on sale</span>

        </div>
    </section>

    <section id="banner3">
        <!--<div class="banner-box banner-box5">
            <h2>Seasonal Sale</h2>
            <h3>Winter Collection 50% off</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Seasonal Sale</h2>
            <h3>Winter Collection 50% off</h3>
        </div>
        <div class="banner-box banner-box4">
            <h2>Seasonal Sale</h2>
            <h3>Winter Collection 50% off</h3>
        </div>-->
    </section>

    <!--<section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletter</h4>
            <p>Get Email Updates about our latest shop and <span>Special offer</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your Email Addresss">
            <button class="normal">Sign Up</button>
        </div>
    </section>-->
    <?php
    require_once "footer.php";
    require_once "chat.php";
    ?>




    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>