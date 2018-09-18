<?php
header('Content-Type: application/json');
set_time_limit(0);
if(isset($_GET['link'])){
	$link = $_GET['link'];
	$link_arr = [];

	foreach (explode(PHP_EOL, $link) as $link) {
		$get_content = file_get_contents($link);
		if(preg_match('#player.peConfig.xmlURL = "(.+?)"#is',$get_content, $link_xml)){
			$data = file_get_contents($link_xml[1]);
			$fomart =  preg_replace('/\s+/', '', $data);
			if(preg_match_all('#<location>(.+?)</location>#is',$fomart, $_jickme)){
					foreach ($_jickme[1] as $link) {
						$url = substr(substr($link, 0, -3), 9);
						if(!in_array($url, $link_arr)){
							array_push($link_arr, $url);
						}
						
					}
			}
		}
	}

	if(count($link_arr) > 0){
		$data_return = array(
			'status' => true,
			'data' => $link_arr
		);
	}else{
		$data_return = array(
			'status' => false,
			'msg' => 'Không thể tìm thấy playlist !'

		);
	}

	echo json_encode($data_return);
}
