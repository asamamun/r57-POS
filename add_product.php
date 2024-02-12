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
if (isset($_POST['id'])){

    $id = $db->escape($_POST['id']);
    // $id = $conn->escape_string($_POST['id']);
    $sql = "SELECT * FROM products WHERE id = " . $id . " LIMIT 1";
    $sql = $db->where('id',$id);
    $result = $db->get('products');
    foreach($result as $row){
        $return_arr = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['retail_price'],
        'sku' => $row['barcode'],
    );  
    };
    // $row = $result->fetch_assoc();
  
    echo json_encode($return_arr);
}
       