<?php
$headers = apache_request_headers();
$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
if (!$is_ajax) {die("only ajax allowed"); exit;}
if(isset($_POST['did'])){
    require "database.php";
    
    $deleteQuery = "delete from products where id='".$_POST['did']."'";
    // echo $deleteQuery;
    $conn->query($deleteQuery);
    if($conn->affected_rows == 1){
        $success = true;
        $message = "Successfully deleted product with id: " . $_POST['did'];
    }
    else{
        $success = false;
        $message = "Error deleting product with id: " . $_POST['did'];
    }
    echo json_encode(['success' => $success, 'message' => $message]);
}
$conn->close();
