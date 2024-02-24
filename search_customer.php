<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb();

if (isset($_GET['term'])){
    $ser_itm = $_GET['term'];
    $sql = $db->where( 'id',$ser_itm.'%', 'like');
    $result = $db->get('customers');
	$return_arr = array();
    foreach ($result as $key => $row){
		if(!isset($row['deleted'])){
			$return_arr[] = array(
				'label' => $row['name'],//required
				'value' => $row['name'],//required
				'id' => $row['id'],
			);
		}
	}
    echo json_encode($return_arr);
    // echo $ser_itm;
}