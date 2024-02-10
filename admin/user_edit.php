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

if (isset($_POST['username'])) {
    $idtoupdate = $_POST['id'];
    $username = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $role = $_POST['role'];
    if ($pass1 == $pass2) {
        $pass = password_hash($pass1, PASSWORD_DEFAULT);
        $data = [
            'name' => $username,
            'password' => $pass,
            'role' => $role
        ];
        $db->where('id', $idtoupdate);
        if ($db->update('users', $data)){
            //echo $db->count . ' records were updated';
            $message = "User Updated successfully";
            header('location: users-all.php');}
        else
            $message = "Something went wrong, " . $db->getLastError();
    }
}

if (isset($_GET['id'])) {

    // $id = $conn->escape_string($_GET['id']);
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id) {
        // $selectQuery = "select id,username,create_at from users where id=$id limit 1";
        // $result = $conn->query($selectQuery);
        // $row = $result->fetch_assoc();
        $db->where('id', $id);
        $row = $db->getOne('users');
        // var_dump($row);
    }
}
?>

<?php require __DIR__ . '/components/header.php'; ?>
<style>
    input,select{
        margin-bottom: 10px;       
        border-radius: 10px;
        border-color: red;
        width: 50%;
        padding: 5px;
        margin-left:80PX;
    }
    form{
        margin-top: 3%;
        margin-left: 25%;
        margin-right: 25%;
       
        /* padding: 10px; */
    }
    .boxshadow{
        /* box-shadow: 0px 0px 30px aqua; */
        padding: 60px;
        border-radius: 10px;
    }   
    .glow {
  /* x y blur spread color */
  box-shadow:
    0px -10px 25px -6px rgba(255, 0, 0, 0.7), /* Red shadow on top */
    0px 5px 35px 20px rgba(0, 0, 0, 0.5),    /* Black shadow on bottom */
    5px 0px 35px 0px rgba(0, 0, 0, 0.3),    /* Black shadow on right */
    -5px 0px 35px 0px rgba(0, 0, 0, 0.3);   /* Black shadow on left */
} 

</style>
</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->
                <?php
                if (isset($message)) echo $message;
                ?>
                <hr>
                <form action="" method="post">
                    
                    <div class="boxshadow glow">
                    <h2>User/Admin data Update form</h2>
                    <hr>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>"> <br>
                        <input type="text" name="username" value="<?= $row['name'] ?>" required> <br>
                        <input type="email" name="email" value="<?= $row['email'] ?>" required> <br>
                        <input type="password" name="pass1" id=""> <br>
                        <input type="password" name="pass2" id=""> <br>
                        <select name="role" id="">
                            <option value="1" <?= ($row['role'] == "1") ? "selected" : "" ?>>User</option>
                            <option value="2" <?= ($row['role'] == "2") ? "selected" : "" ?>>Admin</option>
                            <option value="3" <?= ($row['role'] == "3") ? "selected" : "" ?>>Deactive</option>
                        </select> <br>
                        <input type="submit" value="Update">
                    </div>

                </form>
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