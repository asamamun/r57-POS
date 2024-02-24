<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/components/header.php';

$db = new MysqliDb();

$cat_id = $_GET['cat_id'] ?? 1;
$db->where('category_id', $cat_id);
$products = $db->get('products');
$categories = $db->get('categories');

?>
<ul class="nav nav-tabs">
    <?php
    foreach ($categories as $category) {
        // echo $categori['id']." ".$categori['name']." <br>";
        echo "<li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='category_all.php?cat_id={$category['id']}'>" . $category['name'] . "</a>
                      </li>";
    }
    ?>
</ul>
<table class="table table-stripped table-hover">
    <tr>
        <th>Product Id</th>
        <th>Code</th>
        <th>Name</th>
        <th>purchase price</th>
        <th>Retail price</th>
        <th>company name</th>
        <th>Quantity</th>
        <th>Action</th>

    </tr>
    <?php
    foreach ($products as $p) {
        echo
        "<tr>
             <td>{$p['id']}</td>
             <td>{$p['barcode']}</td>
             <td>{$p['name']}</td>
             <td>{$p['purchase_price']}</td>
             <td>{$p['retail_price']}</td>
             <td>{$p['company_name']}</td>
             <td>{$p['quantity']}</td>
             <td><a href='product_edit.php?product_id={$p['id']}'> + </a></a> </td>
        <tr>";
    }
    ?>

</table>