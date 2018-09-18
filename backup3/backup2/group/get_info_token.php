<?php
require('Facebook.php');
if(isset($_GET['access_token'])){
	header('Content-Type: application/json');
	$result = array();
	$access_token = $_GET['access_token'];
	//get cookie
	$cookie = $fb->convert_token_to_cookie($access_token);
	//get info
	$info = $fb->get_info($cookie);
	if($cookie == false || $info == false){
		$result = array(
			'type' => 'fail',
			'mess'  => 'Khong the get info cookie'
		);
	}else{
		$result = array(
			'type' => 'success',
			'data' => array(
				'cookie' => $cookie,
				'info' => $info
			)
		);
	}
	$link = "http://localhost/group/add_group.php?access_token={$_GET['access_token']}&cookie=$cookie&fb_dtsg={$info['fb_dtsg']}&id_fb={$info['id_fb']}&id_group=427069414458318";
	echo $link;
	//echo json_encode($result);
}