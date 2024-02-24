<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;

if (!Admin::Check()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}
$db = new MysqliDb();
$orderdetails = $db->get('orderdetails');
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
                <div style="background-color:antiquewhite">
                <H1 style="text-align: center; " >ORDER DETAILS</H1>
                <hr>
                </div>
                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Order_ID</th>
                        <th>Product_ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Created</th>
                    </tr>
                    <?php
                    foreach ($orderdetails as $order) {
                        echo
                        "<tr>
                            <td>{$order['id']}</td>
                            <td>{$order['order_id']}</td>
                             <td>{$order['product_id']}</td>
                             <td>{$order['quantity']}</td>
                             <td>{$order['price']}</td>
                             <td>{$order['total']}</td>
                             <td>{$order['created']}</td>                             
                        <tr>";
                    }
                    ?>
                </table>
                <!-- changed content  ends-->
            </main>
            <!-- footer -->
            <?php require __DIR__ . '/components/footer.php'; ?>
        </div>
    </div>
    <script src="<?= settings()['adminpage'] ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-area-demo.js"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/datatables-simple-demo.js"></script>
</body>
</html>