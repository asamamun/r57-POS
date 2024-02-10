<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;

$db = new MysqliDb();
$page = "Home";
?>
<?php require __DIR__ . '/components/header.php'; ?>
</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <!-- product categories -->
                            <?php
                            $categories = $db->get("categories");
                            foreach ($categories as $categories) {
                               echo $categories['name'];
                            }
                            ?>
                            <div>
                                <!-- product per categoris list -->
                                <div>

                                </div>
                            </div>

                        </div>
                        <div class="col-4">
                            <!-- vaucher -->
                        </div>
                    </div>

                </div>











                <!-- changed content  ends-->
            </main>
            <script>

            </script>

            <?php
            require __DIR__ . '/components/footer.php';
            $db->disconnect();
            ?>
        </div>
    </div>
</body>

</html>