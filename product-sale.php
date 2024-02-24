<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Sale Page";
require __DIR__ . '/components/header.php';
$db = new MysqliDb();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .scroll {
        height: 350px;
        /* background-color: coral; */
        overflow-y: scroll;
        overflow-x: none;
        scroll-behavior: smooth;
    }

    /* #positioning{
    position: relative;
} */
    #posbody {
        margin: 0;
        padding: 0;
        font-size: small;
        /* position: static;
         bottom: 0; 
        top: 0; */
    }
    .headinghang{
        position: sticky;
        top:0;
    }
</style>
<main>
    <div class="container-fluid bg-success-subtle">
        <!-- header side -->
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="<?= settings()['logo'] ?>" alt=""> <br>
                <span><i>কিনুন সাচ্ছন্দ্যে।</i></span>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <span style="font-size: 50px; color:chocolate; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"><strong><i>BEST BUY SUPER SHOP</i></strong></span> <br>
            </div>
        </div>
        <?php require __DIR__ . '/components/menubar.php'; ?>
        <hr id="positioning">
        <div id="posbody" class="headinghang">
            <div class="row">
                <div class="col-2 bg-secondary">
                    <h1 class="text-white">Side Bar</h1>
                    <hr>
                </div>
                <div class="col-5 ">
                    <form action="">
                        <div class="d-flex">
                            <input class="form-control p-1" type="text" name="" id="searchProducts" placeholder="Product search">
                        </div>
                    </form>
                    <div id="protablecon" class="scroll">
                        <div class="h4 text-center fw-bolder">ALL PRODUCTS</div>
                        <table class="table table-sm table-hover table-striped table-border">
                            <thead>
                                <tr class="headinghang table-success">
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Add+</th>
                                </tr>
                            </thead>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="images/shark.png" alt=""><i>Best Buy Super Shop</i></h1>
                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                        </div>
                                        <div class="modal-body">
                                            <tbody id="product_table" class="overflow-y-scroll h-100">

                                            </tbody>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </table>

                    </div>
                </div>
                <div class="col-5 border bg-primary bg-opacity-10">
                    <div class="container">
                        <form action="">
                            <div class="row">
                                <div class="col-8">
                                    <div class="input-group p-1">
                                        <input style="width: 30%;" class="form-control" type="text" name="" id="SearchInCustomer" placeholder="Customer id">
                                        <span class="d-none" id="customer_id">1</span>
                                        <span style="width: 70%;" class="input-group-text" id="customer_name"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group p-1">
                                        <!-- barcode search  -->
                                        <input class="form-control" type="number" name="" id="SearchInQR" placeholder="Barcode">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- barcode search and add to table -->
                        <div class="scroll">
                            <table class="table table-sm table-bordered table-hover table-striped">
                                <colgroup>
                                    <col width="10%">
                                    <col width="38%">
                                    <col width="15%">
                                    <col width="12%">
                                    <col width="20%">
                                    <col width="5%">
                                </colgroup>
                                <thead class="headinghang table-success">
                                    <tr class="text-center">
                                        <th>Barcode</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody class="" id="add_product_container">

                                </tbody>
                            </table>

                        </div>

                        <hr>
                        <!-- aria--- account all total count and cancel place order  -->
                        <div class="">
                            <div class="row container">
                                <!-- AC/payment option -->
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Ref:</span><input type="text" class="form-control form-control-sm" name="" id="reference">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text form-control-sm">Payment:</span>
                                        <select name="payment_method" id="payment_method" class="form-select form-select-sm">
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text form-control-sm">Txn:ID</span>
                                        <input type="text" id="txnidin" class="d-none form-control form-control-sm" name="txnidin">
                                    </div>
                                </div>
                                <!-- total amonunt tax discount etc -->
                                <div arianame="count_of_all_total" class="col-sm-6">
                                    <table class="table table-bordered table-sm">
                                        <tr class="row">
                                            <th class="col-6">Total</th>
                                            <th class="col-6 text-end" id="nettotal">0.00</th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-6">TAX</th>
                                            <th class="col-6 text-end" id="grandTAX">0.00</th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-6">Discount</th>
                                            <th class="col-6 text-end" id="discount">0.00</th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-6">Pay Amount</th>
                                            <th class="col-6 text-end" id="payamount">0.00</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- form_Plase_order_and_Cancel -->
                            <div arianame="form_Plase_order_and_Cancel" class="bg-success bg-opacity-25 rounded-2">
                                <form action="">
                                    <div class="d-flex flex-row mb-2">
                                        <div class="p-2 flex-fill">
                                            <input type="button" id="selCancel" class="fw-bold fs-6 form-control btn-light btn btn-outline-warning text-black font-monospace" value="Cancel">
                                        </div>
                                        <div class="p-2 flex-fill">
                                            <input type="button" id="placeOrder" class="fw-bold fs-6 form-control btn btn-info btn-outline-success text-black font-monospace" value="Place Order">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <select name="" id="">
            <option value="' + response.name + '" selected>' + response.name + '</option>
            <option value=""><a href="#" class="deleteproduct" data-id="' + response.id + '"><i class="bi bi-trash3"></i></a></option>
        </select> -->
        <!-- <a href="#" class="deleteproduct" data-id="' + response.id + '"><i class="bi bi-trash3"></i></a> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }
        //01 main function start
        function productList() {

            $.post('product_select.php', function(data) {
                // console.log(data);
                var prolist = JSON.parse(data);
                $htmlpro = '';
                $.each(prolist, function(index, prolist) {
                    $htmlpro += '<tr>';
                    $htmlpro += '<td class="proid d-none">' + prolist.id + '</td>';
                    $htmlpro += '<td class="barcode">' + prolist.barcode + '</td>';
                    $htmlpro += '<td>' + prolist.name + '</td>';
                    $htmlpro += '<td>' + prolist.price + '</td>';
                    $htmlpro += '<td>' + prolist.quantity + '</td>';
                    $htmlpro += '<td><button class="addbutton btn btn-secondary btn-outline-success text-white"><i class="bi bi-cart-plus"></i></button></td>';
                    $htmlpro += '</tr>';
                    //$('#product_table').append($htmlpro);
                    $('#product_table').html($htmlpro);
                });
            });
        };
        //end function 
        productList();
        //02 function start update
        function updateTotal() {
            // nettotal creat
            var nettotal = 0;
            var grenTotal = 0;
            var discount = 0;
            $('.itemtotals').each(function() {
                nettotal += parseFloat($(this).text());
            });

            $('#nettotal').text(financial(nettotal));
            // grandTax 
            $('#grandTAX').text(financial(nettotal * .05));
            //grand total
            grenTotal = parseFloat($('#nettotal').text()) + parseFloat($('#grandTAX').text());
            // console.log(grenTotal);
            if (grenTotal >= 1000) {
                discount = grenTotal * 0.01;
            }
            $('#discount').text(financial(discount));
            $('#payamount').text(financial(Math.round(grenTotal - discount)));
        }
        $(function() {

            // autocomplete in customer

            $('#SearchInCustomer').autocomplete({
                source: "search_customer.php",
                minLength: 1,
                select: function(event, ui) {
                    var id = ui.item.id;
                    addCustomer(id);
                }
            });

            //addcustomer autocomplete give a id
            function addCustomer(id) {
                $.ajax({
                    url: 'customer_add.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        responseee = JSON.parse(response);
                        // console.log(responseee.name);
                        $('#customer_id').text(responseee.id);
                        $('#customer_name').text(responseee.name);
                        $("#SearchInCustomer").val("").focus();
                    }
                });
            };
        });

        //03 function start 
        $(function() {
            // table to add product
            $(document).on('click', '.addbutton', function(e) {
                e.preventDefault();
                let id = $(this).closest('tr').find('.proid').text();
                console.log(id);
                addProduct(id)

            });
            // autocomplete in product
            $("#SearchInQR").autocomplete({
                source: "search_qr.php",
                minLength: 1,
                select: function(event, ui) {
                    var id = ui.item.id;
                    addProduct(id);
                }
            });
            // add to table product and price
            function addProduct(id) {
                $.ajax({
                    url: 'product_add.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        // add new product row in table
                        $html = '<tr class="">';
                        $html += '<td class="productID d-none">' + response.id + '</td>';
                        $html += '<td class=" barcode">' + response.barcode + '</td>';
                        $html += '<td class="">' + response.name + '</td>';
                        $html += '<td class="pprice text-end">' + response.price + '</td>';
                        $html += '<td class="p-1"><input class="quantity form-control form-control-sm pt-1 pe-1" type="number" name="quantity" value="1" min="1" max="' + response.quantity + '"></td>';
                        $html += '<td class="itemtotals text-end">' + response.price + '</td>';
                        $html += '<td class="text-center" ><a href="#" class="deleteproduct" data-id="' + response.id + '"><i class="bi bi-trash3"></i></a></td>';
                        $html += '</tr>';
                        $('#add_product_container').append($html);
                        $("#SearchInQR").val("").focus();
                        updateTotal();
                    }
                });
            }
            $(document).on('blur change keyup', '.quantity', function() {
                var $row = $(this).closest('tr');
                var qty = $row.find('.quantity').val();
                var price = $row.find('.pprice').text();
                var tax = $row.find('.taxin').text();
                var textotal = tax * qty;
                var itemtotal = qty * price;
                $row.find('.itemtotals').text(financial(itemtotal));
                $row.find('.totaltaxin').text(financial(textotal));
                updateTotal();
            });
            // nettotal creat


            //   

            // delete product
            $(document).on('click', '.deleteproduct', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                updateTotal();
            });
            // Cancel btn click and clear table
            $(document).on('click', '#selCancel', function(e) {
                e.preventDefault();
                $("#add_product_container").empty();
                $('#reference').val('');
                $('#payment_method').val('1');
                $('#txnidin').val('');
                $('#txnidin').addClass('d-none');
                updateTotal();
            });
            $.post('account_pay_mathod.php', function(data) {
                var ac_name = JSON.parse(data);
                // console.log(ac_name);
                $.each(ac_name, function(index, account) {
                    $htmlop = '<option value="' + account.id + '">' + account.name + '</option>';
                    $('#payment_method').append($htmlop)
                });
            });
            //payment method
            $("#payment_method").change(function() {
                var payment_method = $(this).val();
                if (payment_method == '1') {
                    $("#txnidin").addClass('d-none');
                } else {
                    $("#txnidin").removeClass('d-none');
                }
            });
        });


        // place order
        $(document).on('click', '#placeOrder', function() {
            var payment_method = $('#payment_method').val();
            if (payment_method == 1) {
                var trxID = '';
            } else {
                var trxID = $('#txnidin').val();
                if (trxID == '') {
                    alert('Please enter Trx ID');
                    return;
                }
            }
            var order = [];
            $('.productID').each(function() {
                var productID = $(this).text();
                var qty = $(this).closest('tr').find('.quantity').val();
                var price = $(this).closest('tr').find('.pprice').text();
                var total = $(this).closest('tr').find('.itemtotals').text();
                order.push({
                    pid: productID,
                    price: price,
                    qty: qty,
                    total: total
                })
            });
            $.ajax({
                url: 'place_order.php',
                method: 'post',
                data: {
                    orders: order,
                    customer_id: $('#customer_id').text(),
                    nettotal: $('#nettotal').text(),
                    grandtotal: $('#payamount').text(),
                    discount: $('#discount').text(),
                    grandTAX: $('#grandTAX').text(),
                    reference: $('#reference').val(),
                    payment_method: payment_method,
                    trxID: trxID
                },
                success: function(response) {
                    console.log(response)
                    // call-back retrun
                    // on-click all add content remove
                    $("#add_product_container").empty();
                    $('#reference').val('');
                    $('#payment_method').val('1');
                    $('#txnidin').val('');
                    $('#txnidin').addClass('d-none');
                    alert('Place Order successfully !!');
                    updateTotal();
                    productList();
                }
            });
        });
    </script>
</main>