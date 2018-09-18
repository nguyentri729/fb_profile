<?php
include_once('../system/Mysql.php');
set_time_limit(0);
if(isset($_GET['bang'])){
	switch ($_GET['bang']) {
		case 'access_token':
			$bang = 'access_token';
			break;
		case 'tokenlike':
			$bang = 'tokenlike';
			break;
		case 'tokencmt':
			$bang = 'tokencmt';
			break;
		case 'tokensub':
			$bang = 'tokensub';
			break;
		default:
			$bang = 'access_token';
			break;
	}
	$xoa = 0;
	foreach ($db->get($bang) as $token) {
		$curl_me = json_decode(curl('https://graph.facebook.com/me?access_token='.$token['access_token'].'&method=GET'), true);
		if(!isset($curl_me['id'])){
			$db->where('id', $token['id']);
			if($db->delete($bang)){
				$xoa++;
			}
		}

	}
	echo 'Đã xóa : '.$xoa.' tokens die';
}

function curl($url, $method='GET'){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_NOBODY, false);
         
    curl_setopt($ch, CURLOPT_URL, $url);
                
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}