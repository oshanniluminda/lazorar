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
    <title>Product Details</title>

    <link rel="stylesheet" href="paginationStyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <section id="header">
        <a href="#"><img src="image/logo.png" alt="Lazorar"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="indexPagination.php">Product</a></li>
                <li><a href="blog/blogIndex.html">Blog</a></li>
                <li><a href="about.php">About</a></li>
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

    <div class="topic">
        <h3>Hurry Up Grab Your Order Soon</h3>
    </div>


    <div class="container">

        <div class="card-content">
            <?php
            $select_pro = mysqli_query($con, "SELECT * FROM `product`");
            if (mysqli_num_rows($select_pro) > 0) {
                while ($fetch_pro = mysqli_fetch_assoc($select_pro)) {
                    ?>
                    <div class="card">
                        <form method="POST" action="manageCart.php">
                            <div class="card-image">
                                <img src="admin/uploaded_img/<?php echo $fetch_pro['proPic']; ?>">
                            </div>
                            <div class="card-info">

                                <i>
                                    <?php echo $fetch_pro['wood']; ?>
                                </i>

                                <h3>
                                    <?php echo $fetch_pro['proName']; ?>
                                </h3>
                                <h4>Rs.
                                    <?php echo $fetch_pro['price']; ?>
                                </h4>
                                <div class="star">
                                    <?php
                                    $count = 1;
                                    while ($count <= 5) {
                                        if ($fetch_pro['star'] >= $count) {
                                            ?>
                                            <i style="color:rgb(255, 255, 0);" class="fas fa-star"></i>
                                            <?php
                                        } else {
                                            ?>

                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>

                                </div>
                            </div>
                            <button type="submit" name="addcart"><i class="fas fa-shopping-cart cart"></i></button>
                            <input type="hidden" name="proId" value="<?php echo $fetch_pro['proId']; ?>">
                            <input type="hidden" name="proName" value="<?php echo $fetch_pro['proName']; ?>">

                            <input type="hidden" name="price" value="<?php echo $fetch_pro['price']; ?>">
                            <h4><input type="number" name="qty" class="qtyInput" min="1" max="99" placeholder="Quantity"
                                    required></h4>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>

    <div class="pagination">
        <li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
        <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">10</a></li>
        <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
    </div>
    </div>

    <script type="text/javascript">
        function getPageList(totalPages, page, maxLength) {
            function range(start, end) {
                return Array.from(Array(end - start + 1), (_, i) => i + start);
            }
            var sideWidth = maxLength < 9 ? 1 : 2;
            var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
            var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

            if (totalPages <= maxLength) {
                return range(1, totalPages);
            }

            if (page <= maxLength - sideWidth - 1 - rightWidth) {
                return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
            }

            if (page >= totalPages - sideWidth - 1 - rightWidth) {
                return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
            }

            return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
        }

        $(function () {
            var numberOfItems = $(".card-content .card").length;
            var limitPerPage = 6;
            var totalPages = Math.ceil(numberOfItems / limitPerPage);
            var paginationSize = 7;
            var currentPage;

            function showPage(whichPage) {
                if (whichPage < 1 || whichPage > totalPages) return false;

                currentPage = whichPage;

                $(".card-content .card").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

                $(".pagination li").slice(1, -1).remove();

                getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                    $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots").toggleClass("active", item === currentPage).append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text(item || "...")).insertBefore(".next-page");

                });

                $(".previous-page").toggleClass("disable", currentPage === 1);

                $(".next-page").toggleClass("disable", currentPage === totalPages);

                return true;
            }

            $(".pagination").append(
                $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text("Prev")),
                $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text("Next")),
            );

            $(".card-content").show();
            showPage(1);

            $(document).on("click", ".pagination li.current-page:not(.active)", function () {
                return showPage(+$(this).text());
            });

            $(".next-page").on("click", function () {
                return showPage(currentPage + 1);
            });

            $(".previous-page").on("click", function () {
                return showPage(currentPage - 1);
            });
        });
    </script>
    <?php
    require_once('chat.php');
    require_once "footer.php";

    ?>
</body>


</html>