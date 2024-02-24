<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb();
$result = $db->where('quantity',1, ">=")->get('products');
$return_arr = array();
    foreach ($result as $key => $row){
			$return_arr[] = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'barcode' => $row['barcode'],
				'quantity' => $row['quantity'],
				'price' => $row['retail_price']
			);
	};
echo json_encode($return_arr);
?>
