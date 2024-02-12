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

</head>

<body>
    <div class="container">
        <hr>
        <img src="<?= settings()['logo'] ?>" alt=""> 
        <span style="font-size: 30px; color:chocolate; margin-left: 200px;"><strong><i>BEST BUY SUPER SHOP</i></strong></span> <br>
        <span><i>কিনুন সাচ্ছন্দ্যে।</i></span>

        <?php require __DIR__ . '/components/menubar.php'; ?>
        
       <div>
        
       </div>

    </div>
    <script>

    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>