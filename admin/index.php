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
                <div class="container-fluid px-4">
                    <h1 style="text-align: center;" class="mt-4">Dashboard</h1>
                    <hr>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total Sale</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">$25000</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Purchase</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">$500</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">New Registration</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">1.8k</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Active HUB List</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">5k</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="15"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-4 card mb-4 m-3" style="background-color: bisque;">
                            <h3 style="text-align: center;">Daily Sales</h3>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>Jason Gilmore</td>
                                    <td>$500</td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>$700</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-3 col-md-4 card mb-4 m-3" style="background-color: cadetblue;">
                            <h3 style="text-align: center;">Daily Collection</h3>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>Adnan Sami</td>
                                    <td>$1500</td>
                                </tr>
                                <tr>
                                    <td>Atif Aslam</td>
                                    <td>$2000</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-4 col-md-4 card mb-4 m-3" style="background-color: chocolate;">
                            <h3 style="text-align: center;">Purchases</h3>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>Smart Watch</td>
                                    <td>$2000</td>
                                </tr>
                                <tr>
                                    <td>Shoes</td>
                                    <td>$2000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 card mb-4 m-3">
                            <h3 style="text-align: center; color: green">Top Selling Products</h3>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>Iphone 13 pro</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <td>Smart Watch</td>
                                    <td>$400</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-5 col-md-5 card mb-4 m-3" style="background-color: antique-white;">
                            <h3 style="text-align: center; color: green">Employee Of The Month</h3>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>POST</th>
                                    <th>Location</th>
                                </tr>
                                <tr>
                                    <td>Scarlet Johanson</td>
                                    <td>Hub 1Manager</td>
                                    <td>Kazipara</td>
                                </tr>
                                <tr>
                                    <td>S. Watson</td>
                                    <td>Hub 2 Manager</td>
                                    <td>Mirpur 10.</td>
                                </tr>
                            </table>
                        </div>
                    </div>                  
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