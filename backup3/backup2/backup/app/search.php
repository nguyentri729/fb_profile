<?php
header('Content-Type: application/json');

include('Mysql.php');
if(isset($_GET['search'])){
	$search = $_GET['search'];
	$app_vip = $db->query("SELECT * FROM app_vip WHERE name LIKE '%$search%'", true);
	echo json_encode($app_vip);
}
