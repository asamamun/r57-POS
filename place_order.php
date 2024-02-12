<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
use App\User;
use App\model\Category;
$db = new MysqliDb();
?>
<?php

if(isset($_POST['orders'])){
    $orders = $_POST['orders'];
    $grandtotal = $db->escape($_POST['grandtotal']);
    $comment = $db->escape($_POST['comment']);
    $payment_method = $db->escape($_POST['payment_method']);
    $trxId =$db->escape( $_POST['trxId']);

    $html = "";
    foreach ($orders as $order) {
        $html .=    $order['pid'] . " : " . $order['qty'] . "<br>";
    }
    $html .= "Grand Total : " . $grandtotal . "<br>";
    $html .= "Comment : " . $comment . "<br>";
    $html .= "Payment Method : " . $payment_method . "<br>";
    $html .= "Transaction ID : " . $trxId . "<br>";
    echo $html;
}
?>