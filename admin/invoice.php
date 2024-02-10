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
$invoice = $db->get('invoice');
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
                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Customer_ID</th>
                        <th>Net_total</th>
                        <th>Discount</th>
                        <th>Grand_total</th>
                        <th>Comment</th>
                        <th>Payment_type</th>
                        <th>Trx_ID</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    <?php
                    foreach ($invoice as $in) {
                        echo
                        "<tr>
                            <td>{$in['id']}</td>
                             <td>{$in['customer_id']}</td>
                             <td>{$in['nettotal']}</td>
                             <td>{$in['discount']}</td>
                             <td>{$in['grandtotal']}</td>
                             <td>{$in['comment']}</td>
                             <td>{$in['payment_type']}</td>
                             <td>{$in['trxid']}</td>
                             <td>{$in['created']}</td>
                             <td>{$in['updated']}</td> 
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