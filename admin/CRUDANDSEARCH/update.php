<?php
$headers = apache_request_headers();
$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
if (!$is_ajax) {die("only ajax allowed"); exit;}
require "database.php";
$id = $_POST['id'];
$psku = $_POST['psku'];
$pn = $_POST['productname'];
$pp = $_POST['productprice'];
// $insertQuery = "insert into products values(NULL,'{$psku}','{$pn}','{$pp}')";
$updateQuery = "update products set sku = '{$psku}', name = '{$pn}', price = '{$pp}' where id ='{$id}' limit 1";
// echo $updateQuery;
// exit;
    
    $conn->query($updateQuery);
    if($conn->affected_rows){
        $success = true;
        $message = "Successfully updated product with id: " . $id;
    }
    else{
        $success = false;
        $message = "Error updating data into products table";  
    }

    echo json_encode(['success' => $success, 'message' => $message]);

    $conn->close();