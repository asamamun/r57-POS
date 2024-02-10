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
$db->where("deleted_at", NULL, 'IS'); //soft delete


if (isset($_GET["access"])) {
    $db->where('role', $_GET["access"]);
}
$users = $db->get('users');

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
                            <caption>
                                <h1 class="text-center">
                                    <?php
                                    /* I filtered user according to the role */
                                    if (!isset($_GET["access"])) {
                                        echo "All Users";
                                    } elseif ($_GET["access"] == 2) {
                                        echo "Admin";
                                    } elseif ($_GET["access"] == 1) {
                                        echo "Generel User";
                                    } else {
                                        echo "Restriced User";
                                    }
                                    ?>
                                </h1>
                            </caption>
                        </div>
                        <!-- ADD memeber button -->
                     <!-- <div class="col">
                            <h1></h1>
                            <a href="user_create.php" class="btn btn-outline-success">ADD Member</a>                           
                        </div> -->
                    </div>


                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        foreach ($users as $user) {
                            if ($user['role'] == 2) {
                                $usercat = "<span class='text-success'><b>Admin</b></span>";
                            } elseif ($user['role'] == 1) $usercat = "<span class='text-primary'>User</span>";
                            else $usercat = "<span class='text-danger'>Deactive</span>";
                            // echo $user['name']."(".$user['email'].")<br>";
                            echo "<tr>
                             <td>" . $user['id'] . "</td>
                             <td>" . $user['name'] . "</td>
                             <td>" . $user['email'] . "</td>
                             <td>" . $usercat . "</td>
                            <td>" . $user['created_at'] . "</td>
                            <td> <a href='user_edit.php?id={$user['id']}'><i class='bi bi-pencil-square'></i></a> || <a href='user_delete.php?id={$user['id']}' onclick='return confirm(\"Are you sure want to delete ?\")'><i class='bi bi-trash3'></i></a> 
                            </td>

                        </tr>";
                        }
                        ?>
                    </table>
                </div>
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