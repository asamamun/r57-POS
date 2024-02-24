<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
// use App\db;
// $conn = db::connect();
$db = new MysqliDb();
$page = "Home";
?>
<?php require __DIR__ . '/components/header.php'; ?>

<style>
    .img {
        max-width: 100%;
    }
</style>
</head>

<body>
    <div class="container" style="background-color: whitesmoke">
    <!-- <div class="container" style="background: linear-gradient(45deg, #3498db, #e74c3c, #2ecc71, #f39c12);"> -->
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="<?= settings()['logo'] ?>" alt=""> <br>
                <span><i>কিনুন সাচ্ছন্দ্যে।</i></span>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <span style="font-size: 50px; color:chocolate; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"><strong><i>BEST BUY SUPER SHOP</i></strong></span> <br>
            </div>
        </div>

        <?php require __DIR__ . '/components/menubar.php'; ?>
        <div>
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-11">
                    <img src="images/pos1.png" class="img" alt="">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis quidem temporibus perspiciatis saepe maxime aliquid impedit, quasi voluptatem officia ipsa, tempora porro ex adipisci placeat molestias autem. Aliquam, similique distinctio!</p>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-12">
                <h5>About us</h5>
                <p style="font-size: small;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores ipsum nihil fuga at sint reiciendis minima sequi aliquam eos consequatur, nulla eum dolorem, debitis temporibus voluptates quod dolorum magnam voluptate.</p>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-12">
                <h5>Contact Us</h5>
                <p style="font-size: small;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis excepturi vitae ullam laborum quam temporibus quisquam aperiam aut laboriosam dolorum. Commodi nulla esse quia alias a corporis, harum autem dolores.</p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <h5>Follow Us</h5>
                <div class="img2">
                    <a href="https://www.facebook.com"><img src="images/facebook.png" height="40px" width="40px" alt="facebook"></a>
                    <a href="https://www.youtube.com"><img src="images/yt.png" alt="youtube" height="65px" width="65px"></a>
                    <a href="https://www.twitter.com"><img src="images/twitters.png" alt="twitter" height="40px" width="40px"></a>
                </div>
            </div>
        </div>

    </div>
    <script>

    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>