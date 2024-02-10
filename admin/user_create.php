<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';    
?>
<?php require __DIR__ . '/components/header.php'; ?>
<?php
if (isset($_POST['submit'])) {
    // require "conn.php";
    $db = new MysqliDb();
    if ($_POST['pass1'] == $_POST['pass2']) {
        $data = [
            'name' => $db->escape($_POST['username']),
            'email' => $db->escape($_POST['email']),
            'password' => password_hash($_POST['pass1'], PASSWORD_DEFAULT),
            'role' => "1"
        ];
        if ($db->insert("users", $data)) {
            header("location: users-all.php");
        } else {
            $message = "Regitration failed!!";
        }
    }
}

?>

</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->

                <div class="container">
                    <h3>Registration Form</h3>
                    <hr>
                    <section class="vh-100" style="background-color: #eee;">
                        <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-lg-12 col-xl-11">
                                    <div class="card text-black" style="border-radius: 25px;">
                                        <div class="card-body p-md-5">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                                    <?php
                                                    if (isset($message)) {
                                                    ?>
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            <strong>Success!</strong> <?= $message; ?>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                    <form class="mx-1 mx-md-4" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="text" name="username" id="form3Example1c" class="form-control" required placeholder="Your Name" />
                                                                <label class="form-label" for="form3Example1c"></label>
                                                                <!-- your name -->
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="email" name="email" id="mmmm" class="form-control" required placeholder="email" />
                                                                <label class="form-label" for="form3Example4cd"></label>
                                                                <!-- email -->
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="password" name="pass1" id="form3Example4c" class="form-control" required placeholder="password" />
                                                                <label class="form-label" for="form3Example4c"></label>
                                                                <!-- Password -->
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="password" name="pass2" id="form3Example4cd" class="form-control" required placeholder="Re-type password" />
                                                                <label class="form-label" for="form3Example4cd"></label>
                                                                <!-- Repeat your password -->
                                                            </div>
                                                        </div>

                                                        <div class="form-check d-flex justify-content-center mb-5">
                                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                                            <label class="form-check-label" for="form2Example3">
                                                                I agree all statements in <a href="#!">Terms of service</a>
                                                            </label>
                                                        </div>

                                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                            <button type="submit" class="btn btn-primary btn-lg" name="submit">Register</button>
                                                        </div>

                                                    </form>

                                                </div>
                                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                                    <img src="assets/img/shark2.jpeg" class="img-fluid" alt="Sample image">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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