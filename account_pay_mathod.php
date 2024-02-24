<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb();
$result = $db->get('accounts');
$return_arr = array();
    foreach ($result as $key => $row){
			$return_arr[] = array(
				'id' => $row['id'],
				'name' => $row['name']
			);
	}
echo json_encode($return_arr);
