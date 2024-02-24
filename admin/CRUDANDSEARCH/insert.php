<?php
$headers = apache_request_headers();
$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
if (!$is_ajax) {die("only ajax allowed"); exit;}
require "database.php";
$psku = $_POST['psku'];
$pn = $_POST['productname'];
$pp = $_POST['productprice'];
$insertQuery = "insert into products values(NULL,'{$psku}','{$pn}','{$pp}')";
    
    $conn->query($insertQuery);
    if($conn->affected_rows){
        $success = true;
        $message = "Successfully inserted with id: " . $conn->insert_id;
    }
    else{
        $success = false;
        $message = "Error inserting data into products table";  
    }

    echo json_encode(['success' => $success, 'message' => $message]);

    $conn->close();