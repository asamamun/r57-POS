<?php
//DONT DO THAT PROCEDURAL STYLE
//mysql_query(),mysqli_query()
//use OOP style
$conn = new mysqli("localhost","root","","r57_php") or die("ERROR!!");
$conn->set_charset("utf8");
if ($conn->connect_errno) {
    printf("Unable to connect to the database:<br /> %s", $conn->connect_error);
    exit();
    }