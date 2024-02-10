<?php
date_default_timezone_set('Asia/Dhaka');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;

if (!Admin::Check()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}
$db = new MysqliDb();
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $data = [
        'deleted_at' => date('Y-m-d h:i:s')
    ];
    $db->where('id', $id);
    if ($db->update('users', $data)){
    $_SESSION['message'] = "User({$id}) deleted successfully";
    header("location: users-all.php");}
    else
        echo 'update failed: ' . $db->getLastError();
};
// -------------------------------
// if (isset($_GET['id'])) {
//     require "conn.php";
//     // $id = $conn->escape_string($_GET['id']);
//     $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
//     if ($id) {
//         $delete_query = "delete from users where id=$id limit 1";
//         $conn->query($delete_query);
//         if ($conn->affected_rows == 1) {
//             $_SESSION['message'] = "User({$id}) deleted successfully";
//             header("location: user_select.php");
//         } else {

//             echo "something went wrong!! contact the administrator";
//             exit;
//         }
//     }
//     $conn->close();
// }
