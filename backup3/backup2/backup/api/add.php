<?php
require('../system/Mysql.php');

if(isset($_GET['data'])){
	$data = json_decode(base64_decode($_GET['data']), true);
	var_dump($data);
	$db->where('email', $data['email']);
	$db->get('account');
	if($db->num_rows() > 0){
		$db->where('email', $data['email']);
		$db->update('account', $data);
	}else{
		$db->insert('account', $data);
	}
}