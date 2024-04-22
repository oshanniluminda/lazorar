<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Information</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="image/logo.png" alt="Lazorar"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="indexPagination.php">Product</a></li>
                <li><a href="blog/blogIndex.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="index.php#contact">Contact</a></li>
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
    <header>
        <h1>Delivery Information</h1>
    </header>
    <main>
        <section class="delivery-section">
            <h2>Shipping Methods</h2>
            <p>We offer various shipping methods to cater to your needs:</p>
            <ul>
                <li>Standard Shipping: Arrives within 5-7 business days.</li>
                <li>Express Shipping: Get your order in 2-3 business days.</li>
                <li>International Shipping: We ship worldwide; delivery times may vary.</li>
            </ul>
        </section>

        <section class="delivery-section">
            <h2>Tracking Your Order</h2>
            <p>Once your order is shipped, you will receive a order confirmation via email. You can use this to
                confirm the status of your delivery.</p>
        </section>

        <section class="delivery-section">
            <h2>Delivery Charges</h2>
            <p>Delivery charges may vary based on your location and selected shipping method. The final delivery cost
                will be calculated during checkout.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 The Lazorar Delivery Service</p>
    </footer>
</body>

</html>