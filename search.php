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
if (isset($_GET['term'])){
	$db->where ("name", '%' . $_GET['term'] . '%', 'like');
	$results = $db->get("products");
	foreach ($results as $row) {
		$return_arr[] = array(
			'label' => $row['name'],
			'value' => $row['name'],
			'id' => $row['id']
		);
	}
    echo json_encode($return_arr);
}
?>