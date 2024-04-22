<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Lazaror</title>
    <link rel="stylesheet" href="styleAbout.css">
</head>

<body>

    <section id="header">
        <a href="#"><img src="image/logo.png" alt="Lazorar"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="indexPagination.php">Product</a></li>
                <li><a href="blog/blogIndex.html">Blog</a></li>
                <li><a href="#">About</a></li>
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
        <h1>About Us</h1>
    </header>
    <main>
        <section class="about-section">
            <h2>Vision</h2>
            <p>We envision a future where the timeless art of woodworking
                is celebrated, where each piece of wood tells a story,
                and where every creation is a testament to the mastery
                of our craft. </p>
        </section>

        <section class="about-section">
            <h2>Mission</h2>
            <p> Our mission is to empower woodworkers of all levels to
                unlock their creative potential
                and craft exceptional pieces that stand the test of time.</p>
        </section>

        <section class="about-section">
            <h2>Team</h2>
            <p> Each member brings their unique skills and passion to the workshop, ensuring that we deliver top-quality
                products
                and exceptional service to our valued customers. </p>
        </section>

        <section class="about-section">
            <h2>Shop Locations</h2>
            <h5>Main Workshop</h5>

            Address: Elakaka, Haburugala-Sri Lanka
            Phone: 0769225132
            Hours: Monday to Friday, 9:00 AM - 6:00 PM

            <h5>Online Store</h5>

            Website: www.thelazoror.com

        </section>


    </main>

    <footer>
        <p>&copy; 2023 - The Lazorar</p>
    </footer>

    <?php

    require_once "chat.php";
    ?>

</body>

</html>