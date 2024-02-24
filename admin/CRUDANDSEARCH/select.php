<?php
require "database.php";
$searchStr = false;
$searchString = false;
if (isset($_GET['psearch'])) {
    $searchString = $conn->real_escape_string($_GET['psearch']);
    // if($_GET['field']=='name'){
    // $field = 'name';
    // }
    // if($_GET['field']=='sku'){
    // $field = 'sku';
    // }
    // $searchStr = " where ".$field." like '%$searchString%' ";

    $searchStr = " where sku like '%$searchString%' or name like '%$searchString%' ";
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = 10;
$offset = ($page - 1) * $pageSize;
//total record start

//for search result
if (isset($_GET['psearch'])) {
    $totalRecordQuery = "select count(*) as total from products" . $searchStr;
}
//for search result end
else {
    $totalRecordQuery = "select count(*) as total from products";
}

$totalRecordQueryResult = $conn->query($totalRecordQuery);
$row = $totalRecordQueryResult->fetch_assoc();
$totalRecord = $row['total'];
//total record end
$totalPages = ceil($totalRecord / $pageSize);


if (isset($_GET['psearch'])) {
    $selectQuery = "select * from products " . $searchStr . " limit $offset,$pageSize";
} else {
    $selectQuery = "select * from products limit $offset,$pageSize";
}

$selectQueryResult = $conn->query($selectQuery);
//echo $selectQueryResult->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="text-right">
            <form action="" method="get">
                <input type="search" name="psearch" id="">
                <input class="btn btn-info" type="submit" value="Search" name="searchBtn">
                <input class="btn btn-info" type="button" value="Clear" name="clearBtn" onclick="refreshpage()">
                <a href="javascript:void(0)" class="btn btn-primary" id="addBtn">Add</a>
            </form>

        </div>
        <!-- insert form -->
        <div id="formContainer">
            <h3>Create New Product</h3>
            <form action="">
                <input type="hidden" name="id" id="updateid">
                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control" id="sku" maxlength="8">
                </div>
                <div class="form-group">
                    <label for="pname">Name</label>
                    <input type="text" class="form-control" id="pname">
                </div>
                <div class="form-group">
                    <label for="pprice">Price</label>
                    <input type="text" class="form-control" id="pprice">
                </div>
                <div class="form-group">
                    <input type="button" value="Insert" id="insertBtn" class="btn btn-outline-success">
                    <input type="button" value="Update" id="updateBtn" class="btn btn-outline-warning">
                </div>
            </form>
        </div>
        <!-- insert form end -->
        <div id="tableContainer"> 
            <table class="table table-bordered table-striped">
                <caption>Total Products: <?php echo $row['total']; ?></caption>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>SKU</th>
                        <th>NAME</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php

                if ($selectQueryResult->num_rows > 0) {
                    while ($row = $selectQueryResult->fetch_assoc()) {
                        echo "<tbody><tr>
        <td class='pid'>" . $row['id'] . "</td>
        <td class='psku'>" . $row['sku'] . "</td>
        <td class='pname'>" . $row['name'] . "</td>
        <td class='pprice'>" . $row['price'] . "</td>
        <td>
        <a href='javascript:void(0)' data-id='{$row['id']}'><img class='editIcon' src='../../assets/images/edit16x16.png'/></a>
        <a href='javascript:void(0)' data-id='{$row['id']}'><img class='deleteIcon' src='../../assets/images/delete16x16.png'/></a>
        </td>
    </tr></tbody>";
                    }
                }
                $selectQueryResult->free();
                $conn->close();
                ?>
            </table>
        </div>
        <hr>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php

                $p = (($page - 1) > 0) ? ($page - 1) : 1;
                $prev_disabled = ($page == 1) ? "disabled" : "";
                echo '<li class="page-item ' . $prev_disabled . '"><a class="page-link" href="?page=1' . '&psearch=' . ($searchString ? $searchString : '') . '">First</a></li>';
                echo '<li class="page-item ' . $prev_disabled . '"><a class="page-link" href="?page=' . $p . '&psearch=' . ($searchString ? $searchString : '') . '">Previous</a></li>';
                //echo $active.'<a class="page-link" href="?page='.($page-1).'">Previous</a>';
                for ($i = 1; $i <= $totalPages; $i++) {
                    $active = ($page == $i) ? "active" : '';


                    if (abs($page - $i) < 6) {

                        // echo '<li class="page-item '.$active.'"><a class="page-link" href="?page='.$page-1.'"> 'Previous'</a></li>';
                        echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '&psearch=' . ($searchString ? $searchString : '') . '">' . $i . '</a></li>';
                    }

                    // echo '<li class="page-item '.$active.'"><a class="page-link" href="?page='.$page+1 .'">'."Next" .'</a></li>';
                }
                $n = (($page + 1) < $totalPages) ? ($page + 1) : $totalPages;
                $next_disabled = ($page == $totalPages) ? "disabled" : "";
                echo '<li class="page-item ' . $next_disabled . '"><a class="page-link" href="?page=' . $n . '&psearch=' . ($searchString ? $searchString : '') . '">Next</a></li>';
                echo '<li class="page-item ' . $next_disabled . '"><a class="page-link" href="?page=' . $totalPages . '&psearch=' . ($searchString ? $searchString : '') . '">Last</a></li>';
                echo '<input type="text" id="gotoTxt" size="1"/><button id="gotoBtn" class="btn btn-outline-info">GO</button>';

                ?>
            </ul>
        </nav>
    </div>
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function refreshpage() {
            window.location.href = "select.php";
        }
        $(document).ready(function() {
            $("#formContainer").hide();
            //show-hide form
            $("#addBtn").click(function() {
                clearform();
                $("#formContainer").toggle(500);
                $("#updateBtn").hide(200);
                $("#insertBtn").show(200);
            });
            //clearform
            function clearform() {
                $("#updateid").val("");
                $("#sku").val("");
                $("#pname").val("");
                $("#pprice").val("");
            }
            //insert
            $("#insertBtn").click(function() {
                let sku = $("#sku").val();
                let pname = $("#pname").val();
                let pp = $("#pprice").val();
                if (sku.length && pname.length && pp.length) {
                    //ajax request
                    $.post("insert.php", {
                        psku: sku,
                        productname: pname,
                        productprice: pp
                    }, function(d) {
                        console.log(d);

                        if (d.success) {
                            //swal
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: d.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            //swal end
                            clearform();
                            $("#formContainer").hide(500);
                        } else {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: d.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }, "json");
                } else {
                    alert("all required");
                }
            });

            //edit
            $("#tableContainer").on("click", ".editIcon", function() {
                let t = $(this);
                let id = t.parent().data("id");
                let fid = t.closest("tr").find(".pid").html();
                let psku = t.closest("tr").find(".psku").html();
                let pname = t.closest("tr").find(".pname").html();
                let pprice = t.closest("tr").find(".pprice").html();
                // alert(id + ": " + psku + " , " + pname + " , " + pprice);                
                $("#updateid").val(id);
                $("#sku").val(psku);
                $("#pname").val(pname);
                $("#pprice").val(pprice);
                // $("#addBtn").trigger("click");
                $("#insertBtn").hide(200);
                $("#updateBtn").show(200);
                $("#formContainer").show("200");
            });
            //update
            $("#updateBtn").click(function() {

                let id = $("#updateid").val();
                let sku = $("#sku").val();
                let pname = $("#pname").val();
                let pp = $("#pprice").val();
                if (sku.length && pname.length && pp.length && id.length) {
                    //ajax request
                    $.post("update.php", {
                        id: id,
                        psku: sku,
                        productname: pname,
                        productprice: pp
                    }, function(d) {
                        console.log(d);

                        if (d.success) {

                            //swal
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: d.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(e => location.reload());
                            //swal end
                            clearform();
                            $("#formContainer").hide(500);
                        } else {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: d.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }, "json");
                } else {
                    alert("all required");
                }
                // 
            });
            //delete
            $("#tableContainer").on("click", ".deleteIcon", function() {
                //swal delete
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        //
                        //swal delete end
                        let t = $(this);
                        let id = t.parent().data("id");
                        $.post("delete.php", {
                            did: id
                        }, function(d) {
                            //
                            if (d.success) {

                                //swal
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: d.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(e => t.closest("tr").remove());
                                //swal end
                            } else {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    title: d.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                            //

                        }, "json");
                        //
                    }
                });
            });//delete end
            //goto start
            $("#gotoBtn").click(function(){
                let page = Number($("#gotoTxt").val());//NaN
                if(isNaN(page) || page == "") return;
                window.location = "select.php?page="+page+"&psearch=";
            });
            //goto end
        });
    </script>
</body>

</html>