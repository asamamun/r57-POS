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
$employee = $db->get('employee');
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
                    <H1 style="text-align: center;">Employee List</H1>
                    <hr>
                </div>
                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Employee Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Join date</th>
                        <th>POST</th>
                        <th>Branch ID</th>
                        <th>Salary</th>
                        <th>Delete_At</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($employee as $in) {
                        echo
                        "<tr>
                            <td>{$in['eid']}</td>
                             <td>{$in['frist_name']}</td>
                             <td>{$in['last_name']}</td>
                             <td>{$in['contact']}</td>
                             <td>{$in['address']}</td>
                             <td>{$in['join_date']}</td>
                             <td>{$in['post']}</td>
                             <td>{$in['branch_id']}</td>
                             <td>{$in['salary']}</td>
                             <td>{$in['delete_at']}</td> 
                             <td><a href='#?customers_id={$in['eid']}'><i class='bi bi-pencil-square'></i></a></a> || <a href='#?customers_id={$in['eid']}' onclick='return confirm(\"Are you want sure want to delete ?\")'><i class='bi bi-trash3'></i></a></td>
                             
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