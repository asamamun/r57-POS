<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb();
if (isset($_POST['id'])){
    $id = $db->escape($_POST['id']);
    $row = $db->where("id", $_POST['id'])->getOne("products");
    $return_arr = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['retail_price'],
        'barcode' => $row['barcode'],
        'tax' => $row['tax'],
        'quantity' => $row['quantity']
    );
    echo json_encode($return_arr);
}