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
        <?php
        // echo testfunc();
        // var_dump(settings());
        $u = new User();
        // echo $u->testme();
        ?>
        <?php
        // $r = $conn->query("select * from users");
        $users = $db->get('users');
        // var_dump($users);
        // foreach($users as $user){
        //     echo $user['name']."(".$user['email'].")<br>";
        // }
        // echo "<h1>Total Users: ".count($users)."</h1>";
        ?>
        <!-- <hr> -->
        <?php
        // echo Category::testing();
        ?>
        
        <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <!-- product categories -->
                            <?php
                            $categories = $db->get("categories");
                            foreach ($categories as $categories) {
                               echo "<div>".$categories['name']."</div><hr>";
                               require "product_all.php";
                            }?>

                        </div>
                        <div class="col-4">
                            <!-- vaucher -->
                            <?php
                            // add hobe r kaj korte hobe paser page
                            require "addsale.php"
                            ?>
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