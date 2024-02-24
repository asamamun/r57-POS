<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb();

if (isset($_GET['term'])){
    $something = $_GET['term'];
    $sql = $db->where( 'barcode','%'.$something.'%', 'like')->where ('quantity',1, ">=");
    $result = $db->get('products');
	$return_arr = array();
    foreach ($result as $key => $row){
		if(isset($row['barcode'])){
			$return_arr[] = array(
				'label' => $row['name'],//required
				'value' => $row['barcode'],//required
				'id' => $row['id']
			);
		}
		else{
			$return_arr[] = array(
				'label' => "Data not found",//required
				'value' => $row['barcode']//required
			);
		}
	}
    echo json_encode($return_arr);
}