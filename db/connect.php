<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "qlyshop"; 

$con=new mysqli("localhost","root","","qlyshop");
if(!$con)
{
	die("Lỗi kết nối".$con->connect_error);
}
?>