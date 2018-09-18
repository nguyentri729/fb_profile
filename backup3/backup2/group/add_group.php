<?php
if(isset($_GET['access_token'])){
	require('Facebook.php');
	$token = $_GET['access_token'];
	$cookie = $_GET['cookie'];
	$fb_dtsg = $_GET['fb_dtsg'];
	$id_fb = $_GET['id_fb'];
	$id_gr = $_GET['id_group'];
	$userids = array();
	/*$token = 'EAAAAAYsX7TsBAJQSiuYgxsp2maf4SJOGNPs3y3sCvw7dFNZC5wsDdoIvDxZBJGhHGGW4kjE8OSAZBQlQkVTfXoZCwVF5BS7d1OzS2lPRUcBcYMWEYogeBgT2RidIy6twgfGk9Fr0OWMQQ9o3ZAZCePrs7qjhzdIIhZCEZBKxfSQJsgPuyrUSVjr9nsldf717RvsNZANhMAoeNKn2LHLuO2wT1';
	$cookie = 'c_user=100008117474071; xs=17:GiNXSpt2Rxskxg:2:1530730631:4409:5307; fr=076xABpQQvgzAdOji.AWXvKbSUWgrOrn4qxBMMig0QJVQ.BbeOnx..AAA.0.0.BbeOnx.AWWVDNST; datr=8el4WzCZoTA2OKKS3wXIOpV4;';
	$fb_dtsg = 'AQEa5UwoTedS:AQH_rDEvrady';
	$id_fb = '100008117474071';
	$id_gr = '427069414458318';*/
	//get list id

	$url = 'https://graph.facebook.com/v2.6/'.$id_gr.'/member_requests?fields=id&access_token='.$token.'&limit=50';

	$data_member = json_decode($fb->curl_url($url), true);
	//var_dump($data_member);
	if(isset($data_member['data'])){
		$post_data = array(
			'add' => 1,
			'isbulk' => 1,
			'source' => 'requests_queue',
			'm_sess' => '',
			'fb_dtsg' => $fb_dtsg,
			'jazoest' => '',
			'__dyn' => '',
			'__req' => 'f',
			'__ajax__' => '',
			'__user' => $id_fb
		);
		$i = 0;
		foreach ($data_member['data'] as $id_request) {
			$post_data['userids'][$i] = $id_request['id'];
			$i++;
		}
		//var_dump($post_data);
		//creat post data

		/*$data = 'av='.$id_fb.'&__user='.$id_fb.'&__a=1&__dyn=7AgNe-4amaAxd2u6aJGeFxqeCwKyWzEpF4Wo8ovxGdwIhE98nwgUaofUvHyocWwIKaxeUW3KbwTz8S2SUS3C6pUkz8nwsUC4E9ohwoU8U5SE2KDw822iu4pHxC68nxK1Iwgovy88E5S48SexeEgy9E6aER7x3x69wyUy7Vm4-2y48Om9wzwyVE4W2-48G14x92EgWKuV8zwkEtwTxe2m6o&__req=1y&__be=1&__pc=PHASED%3ADEFAULT&__rev=4226269&fb_dtsg='.$fb_dtsg.'&jazoest=26581701075377758945120119755865817070108507452868175101&__spin_r=4226269&__spin_b=trunk&__spin_t=1534651560&fb_api_caller_class=RelayModern&variables=%7B%22input%22%3A%7B%22client_mutation_id%22%3A%221%22%2C%22actor_id%22%3A%22'.$id_fb.'%22%2C%22group_id%22%3A%22'.$id_gr.'%22%2C%22source%22%3A%22requests_queue%22%2C%22pending_member_filters%22%3A%7B%22filters%22%3A%5B%5D%7D%7D%7D&doc_id=1511272355657946';
		//post
		echo $fb->curl_post('https://www.facebook.com/api/graphql/','POST', $data, $cookie);*/
		echo $fb->curl_post('https://m.facebook.com/groups/'.$id_gr.'/write_async/requests/','POST', http_build_query($post_data), $cookie);
	}else{
		echo 'lo sad';
		return false;
	}

	//Post Approve request


}