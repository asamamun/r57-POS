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
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/jquery-ui-1.13.1/jquery-ui.min.css" type="text/css" />

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->


</head>

<body>
    <div class="container">
    <hr>
        <img src="<?= settings()['logo'] ?>" alt="">
        <span style="font-size: 30px; color:chocolate; margin-left: 200px;"><strong><i>BEST BUY SUPER SHOP</i></strong></span> <br>
        <span><i>কিনুন সাচ্ছন্দ্যে।</i></span>
        

        <?php
        require __DIR__ . '/components/menubar.php';
        ?>

        <div>

            <body>

                <form action='' method='post'>
                    <p><label><b style="font-size: larger;">Product: </b></label><input type='text' id="productname" name='productname' value='' class='auto rounded p-1' placeholder='Search product'></p>
                </form>
                <table id="product_table" class="table table-responsive">
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Item Total</th>
                        <th>Action</th>
                    </tr>
                    <tbody id="dyn_tr"></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="2">Total: <span id="grandtotal"></span></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="text" name="comment" id="comment" placeholder="Reference" class="rounded p-1">
                                <select name="payment_method" id="payment_method" class="rounded p-1">
                                    <option value="cash">Cash</option>
                                    <option value="bkash">bKash</option>
                                    <option value="nogod">Nogod</option>
                                    <option value="upay">Upay</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="tcash">T-cash</option>
                                </select>
                                <input type="text" name="trxId" id="trxId" class="d-none" placeholder="transaction ID">
                            </td>
                            <td> <button class="btn btn-secondary">Back</button> </td>
                            <td> <input type="button" id="orderBtn" class="btn btn-info" value="Place Order" data-bs-toggle="modal" data-bs-target="#exampleModal"></td>
                        </tr>
                    </tfoot>

                </table>
                <!-- <h3>Payment Receive:</h3> -->
                <!-- payment received window-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="images/shark.png" alt=""><i>Best Buy Super Shop</i></h1>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div id="response" class="p-2 rounded" style="background-color: whitesmoke;">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Print</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
                <script type="text/javascript" src="assets/jquery-ui-1.13.1/jquery-ui.min.js"></script>
                <script type="text/javascript">
                    function financial(x) {
                        return Number.parseFloat(x).toFixed(2);
                    }

                    $(document).ready(function() {

                        //autocomplete
                        $("#productname").autocomplete({
                            source: "search.php",
                            minLength: 1,
                            select: function(event, ui) {
                                var id = ui.item.id;
                                addProduct(id);
                            }
                        });

                        function addProduct(id) {
                            $.ajax({
                                url: 'add_product.php',
                                type: 'post',
                                data: {
                                    id: id
                                },
                                success: function(response) {
                                    //console.log(response);
                                    response = JSON.parse(response);
                                    //console.log(response);
                                    $html = '<tr>';
                                    $html += '<td class="pid d-none">' + response.id + '</td>';
                                    $html += '<td class="pname">' + response.name + '</td>';
                                    $html += '<td class="pprice">' + response.price + '</td>';
                                    $html += '<td>' + response.sku + '</td>';
                                    $html += '<td><input class="qu" type="number" min="1" name="quantity" value="1"></td>';
                                    $html += '<td class="itemtotal">' + response.price + '</td>';
                                    $html += '<td><a href="#" class="deleteproduct" data-id="' + response.id + '">Delete</a></td>';
                                    $html += '</tr>';
                                    $('#dyn_tr').append($html);
                                    $("#productname").val("").focus();
                                    updateTotal();
                                }
                            });
                        }
                        //delete product
                        $(document).on('click', '.deleteproduct', function(e) {
                            e.preventDefault();
                            $(this).closest('tr').remove();
                        });
                        //update total
                        $(document).on('blur change keyup', '.qu', function() {
                            var $row = $(this).closest('tr');
                            var qty = $row.find('.qu').val();
                            var price = $row.find('.pprice').text();
                            var itemtotal = qty * price;
                            console.log(itemtotal);
                            $row.find('.itemtotal').text(financial(itemtotal));
                            updateTotal();
                        });

                        function updateTotal() {
                            //console.log($('.itemtotal'));
                            var grandtotal = 0;
                            $('.itemtotal').each(function() {
                                grandtotal += parseFloat($(this).text());
                            });
                            $('#grandtotal').text(grandtotal);
                        }
                        //payment method
                        $("#payment_method").change(function() {
                            var payment_method = $(this).val();
                            if (payment_method == 'cash') {
                                $("#trxId").addClass('d-none');
                            } else {
                                $("#trxId").removeClass('d-none');
                            }
                        });

                        //place order
                        $(document).on('click', '#orderBtn', function() {
                            //check if payment method is cash
                            var payment_method = $("#payment_method").val();
                            if (payment_method == 'cash') {
                                var trxId = '';
                            } else {
                                var trxId = $("#trxId").val();
                                if (trxId == '') {
                                    alert('Please enter transaction ID');
                                    return;
                                }
                            }

                            //invoice a ekhon product num soho dekhabe.
                            // R pid dia korle id dekhabe.
                            var order = [];
                            // $('.pid').each(function() {
                            $('.pname').each(function() {
                                // var pid = $(this).text();
                                var pname = $(this).text();
                                var qty = $(this).closest('tr').find('.qu').val();
                                order.push({
                                    // pid: pid,
                                    pname: pname,
                                    qty: qty
                                });
                            });
                            //console.log(order);
                            $.ajax({
                                url: 'place_order.php',
                                type: 'post',
                                data: {
                                    orders: order,
                                    grandtotal: $('#grandtotal').text(),
                                    comment: $('#comment').val(),
                                    payment_method: payment_method,
                                    trxId: trxId
                                },
                                success: function(response) {
                                    console.log(response);
                                    $('#response').html(response);
                                    $('#dyn_tr').empty();
                                    $('#grandtotal').text(0);
                                    $('#comment').val('');
                                    $('#payment_method').val('cash');
                                    $('#trxId').val('');
                                    $('#trxId').addClass('d-none');
                                    alert('Order placed successfully');
                                }
                            });
                        })
                    });
                </script>
            </body>

        </div>

    </div>
    <script>

    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>