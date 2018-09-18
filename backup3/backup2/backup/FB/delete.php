<?php
set_time_limit(0);
$token = 'EAAAAUaZA8jlABAL1KqVoHk9m6CCsZCOaZAuVgdjeSsm5JZCWYzAt9B1p2lZBfWqTShfoMpuLZBiyw3Wtj6gZBpEMrZCwS66r8DRXwojFucVTLP7to3gAMJwDTuY3Nqy3pEjevsc7H5xTxRKQTvEbhdkYShv21n4YNkaiZBfQKKn4n2AZDZD';
$link = 'https://graph.facebook.com/v3.1/me/feed?access_token='.$token.'';
$i = 1;
while (true) {
	if($i > 300){
		break;
	}
	@$get_link = json_decode(file_get_contents($link), true);
	foreach ($get_link['data'] as $post) {
		@file_get_contents('https://graph.facebook.com/v3.1/'.$post['id'].'?access_token='.$token.'&method=DELETE');
		$i++;
	}
	if(isset($get_link['paging']['next'])){
		if($get_link['paging']['next'] !=''){
			$link = $get_link['paging']['next'];
		}else{
			break;
		}
	}else{
		break;
	}
}