<?php
$cat_id = $categories['id'];
$db->where('category_id', $cat_id);
$products = $db->get('products');
foreach($products as $products){
echo "<span>".$products['name']." || </span>";
}
?>
<hr>