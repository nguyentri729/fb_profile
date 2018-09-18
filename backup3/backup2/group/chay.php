<?php
set_time_limit(0);
$arr_token = explode(PHP_EOL, file_get_contents('list_token.txt'));
$max = 5; //mỗi token thêm bao nhiêu người 
$id_gr = file_get_contents('id_group.txt');
$tong = 0; $fail = 0;
foreach ($arr_token as $token) {
	$i = 0;
	$url = 'https://graph.facebook.com/v2.6/'.$id_gr.'/member_requests?fields=id&access_token='.$token.'&limit=50';

	
	while(true){

		$data_member = json_decode(curl_url($url), true);

		if(isset($data_member['paging']['next'])){
			$url = $data_member['paging']['next'];
		}else{
			break;
		}
		if(isset($data_member['data'])){
			foreach ($data_member['data'] as $id_request) {
				if(add($id_request['id'], $token)){
					$tong++;
				}else{
					$fail++;
				}
				$i++;
			}

		}
		if($i >= $max){
			break;
		}

	}
	
}
echo "success: $tong <br> error: $fail";
function add($id, $token){
	$id_gr = file_get_contents('id_group.txt');
	$accept = curl_url('https://graph.facebook.com/'.$id_gr.'/members/'.$id.'?access_token='.$token.'&method=POST');
	var_dump($accept);
	if($accept == 'true'){
		return true;
	}else{
		return false;
	}
	
}
//biết sao lỗi ròi :3

//https://graph.facebook.com/427069414458318?fields=member_request_count,member_requests.limit(50)&access_token=' + token
function curl_url($url){
	    $ch = @curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_ENCODING, '');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Expect:'
	    ));
	    $page = curl_exec($ch);
	    curl_close($ch);
	    return $page;
}