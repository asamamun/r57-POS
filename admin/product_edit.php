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

if (isset($_POST['barcode'])) {

    $p_id = $_POST['id'];
    $p_barcode = $_POST['barcode'];
    $p_name = $_POST['name'];
    $p_com_name = $_POST['company_name'];
    $p_cat_id = $_POST['category_id'];
    $p_supp_id = $_POST['supplier_id'];
    $p_whole_price = $_POST['wholesale_price'];
    $p_retail_price = $_POST['retail_price'];
    $p_purchase_price = $_POST['purchase_price'];
    $p_quantity = $_POST['quantity'];
    $p_description = $_POST['description'];
    $p_tax = $_POST['tax'];
    $p_created = $_POST['created'];

    $data = [
        // 'id'=> $p_id,
        'barcode' => $p_barcode,
        'name' => $p_name,
        'company_name' => $p_com_name,
        'category_id' => $p_cat_id,
        'supplier_id' => $p_supp_id,
        'wholesale_price' => $p_whole_price,
        'purchase_price' => $p_purchase_price,
        'quantity' => $p_quantity,
        'description' => $p_description,
        'tax' => $p_tax,
        'created' => $p_created,


    ];
    $db->where('id', $p_id);

    if ($db->update('products', $data)) {
        //echo $db->count . ' records were updated';
        $message = "User Updated successfully";
    } else
        $message = "Something went wrong, " . $db->getLastError();
}



if (isset($_GET['product_id'])) {

    // $id = $conn->escape_string($_GET['id']);
    $id = filter_var($_GET['product_id'], FILTER_VALIDATE_INT);
    if ($id) {
        // $selectQuery = "select id,username,create_at from users where id=$id limit 1";
        // $result = $conn->query($selectQuery);
        // $row = $result->fetch_assoc();
        $db->where('id', $id);
        $row = $db->getOne('products');
        // echo '<br><br><br><br>';
        // var_dump($row);
    }
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
                <?php
                // if(isset($message)) echo $message;
                ?>
                <div class="container-md p-5">
                    <form action="" method="post">
                        <div class="h2">Porduct Update</div>
                        <input class="form-control m-2" type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">Barcode</div>
                                    <input class="form-control" type="text" name="barcode" value="<?= $row['barcode'] ?>" require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">Name</div>
                                    <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>" require>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                            <div class="input-group mb-3">
                            <div class="input-group-text">Company_name</div>
                            <input class="form-control" type="text" name="company_name" value="<?= $row['company_name'] ?>" require>
                        </div>
                            </div>
                            <div class="col-sm-3">
                            <div class="input-group mb-3">
                            <div class="input-group-text">Category_id</div>
                            <input class="form-control" type="text" name="category_id" value="<?= $row['category_id'] ?>" require>
                        </div>
                            </div>
                            <div class="col-sm-3">
                            <div class="input-group mb-3">
                            <div class="input-group-text">Supplier_id</div>
                            <input class="form-control" type="text" name="supplier_id" value="<?= $row['supplier_id'] ?>" require>
                        </div>
                            </div>
                        </div>


                        
                       
                       
                        <div class="input-group mb-3">
                            <div class="input-group-text">Wholesale_price</div>
                            <input class="form-control" type="text" name="wholesale_price" value="<?= $row['wholesale_price'] ?>" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Retail_price</div>
                            <input class="form-control" type="text" name="retail_price" value="<?= $row['retail_price'] ?>" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Purchase_price</div>
                            <input class="form-control" type="text" name="purchase_price" value="<?= $row['purchase_price'] ?>" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Quantity</div>
                            <input class="form-control" type="text" name="quantity" value="<?= $row['quantity'] ?>" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Description</div>
                            <input class="form-control" type="text" name="description" value="<?= $row['description'] ?>" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">TAX</div>
                            <input class="form-control" type="text" name="tax" value="<?= $row['tax'] ?>" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Created Time</div>
                            <input class="form-control" type="text" name="created" value="<?= $row['created'] ?>" require>
                        </div>

                        <input class="btn btn-warning" type="submit" value="Update"> <br>

                    </form>
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