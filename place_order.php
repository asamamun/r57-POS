<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

// Assuming your MysqliDb() constructor requires database connection parameters
$db = new MysqliDb();

if (isset($_POST['orders'])) {
    $orders = $_POST['orders'];
    $costomerID = $db->escape($_POST['customer_id'] ?? 1);
    $nettotal = $db->escape($_POST['nettotal']);
    $grandtotal = $db->escape($_POST['grandtotal']);
    $discount = $db->escape($_POST['discount']);
    $grandTAX = $db->escape($_POST['grandTAX']);
    $reference = $db->escape($_POST['reference']);
    $payment_method = $db->escape($_POST['payment_method']);
    $trxID = $db->escape($_POST['trxID']);

    try {
        $db->startTransaction();

        // Inserting invoice data
        $invoiceData = [
            'customer_id' => $costomerID,
            'total' => $nettotal,
            'total_tax' => $grandTAX,
            'discount' => $discount,
            'pay_amount' => $grandtotal,
            'comment' => $reference,
            'payment_type' => $payment_method,
            'trxid' => $trxID,
        ];
        $db->insert('invoice', $invoiceData);
        $invoiceId = $db->getInsertId();

        //Get the current balance in acount
        $currentBalance = $db->where('id',$payment_method)->getValue('accounts','balance');
        
        // Calculate the new balance
        $newBalance = $currentBalance + $grandtotal;

        $getdata = ['balance' => $newBalance];
        $db->where('id', $payment_method)->update('accounts', $getdata);

        // Inserting invoice details
        foreach ($orders as $order) {
            $invoiceDetails = [
                'invoice_id' => $invoiceId,
                'product_id' => $order['pid'],
                'quantity' => $order['qty'],
                'price' => $order['price'],
                'total' => $order['total'],
            ];
            $db->insert('invoicedetails', $invoiceDetails);

            // Get the current quantity
            $currentQuantity = $db->where('id',$order['pid'])->getValue('products', 'quantity');

            // Calculate the new quantity 
            $newQuantity = $currentQuantity - $order['qty'];
            // Prepare the update data
            $data = ['quantity' => $newQuantity];

            // Perform the update
            $db->where('id', $order['pid']);
            $db->update('products', $data);
            // $html = "";
            echo json_encode($invoiceData);
        }

        $db->commit();

         echo json_encode('Transaction Success!!');
    } catch (\Throwable $th) {
        echo $th->getMessage();
        $db->rollback();
        echo "Transaction failed!";
    }
}
?>
