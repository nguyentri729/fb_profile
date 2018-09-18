
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BotReactionsPro extends CI_Controller {

	public function index()
	{
		$h = date('H');
		set_time_limit(0);

		$this->db->select('bot_reactions_pro.cam_xuc_su_dung,bot_reactions_pro.cum_tu_ko_tt,bot_reactions_pro.gender,bot_reactions_pro.age_start,bot_reactions_pro.nguoi_ko_tt,bot_reactions_pro.age_end,access_token.access_token, access_token.id_fb');
		$this->db->from('bot_reactions_pro');
		$this->db->limit(10);
		$this->db->order_by('bot_reactions_pro.id', 'RANDOM');
		$this->db->where('bot_reactions_pro.time_start <=', $h);
		$this->db->where('bot_reactions_pro.time_end >=', $h);
		$this->db->join('access_token','bot_reactions_pro.id_fb=access_token.id_fb');
						
		$get = $this->db->get()->result_array();

		foreach ($get as $bot) {
			$quet = json_decode($this->m_func->curl_api('https://graph.facebook.com/me/home?access_token='.$bot['access_token'].'&method=GET&fields=message'), true);
			if(isset($quet['data'])){
				foreach ($quet['data'] as $post) {
					$id_nguoi_post =  explode('_', $post['id'])[0];
					$id_type = $this->id_type($id_nguoi_post, $bot['access_token']);

					if($id_type['type'] == 'profile'){
						$age_id = $id_type['data']['age'];
						$gender_id = $id_type['data']['gender'];
						//Check Tuổi
						if( $age_id != ''){
							if($age_id < $bot['age_start'] OR $age_id > $bot['age_end']){
								continue;
							}
						}
						//Check giới tính
						if($gender_id != ''){
							if($bot['gender'] != 2){
								if($gender_id != $bot['gender']){
									
									continue;
								}
							}
						}
					}
					//Lọc cụm từ không tương tác
					if($bot['cum_tu_ko_tt'] != ''){
						if(preg_match("({$bot['cum_tu_ko_tt']})", $post['message'])){
							//echo 'Lọc từ';
							continue;
						}
					}
					//Lọc ID không tương tác
					if($bot['nguoi_ko_tt'] != ''){
						$ds_nguoi = explode(PHP_EOL, $bot['nguoi_ko_tt']);
						if(in_array($id_nguoi_post, $ds_nguoi)){
							//echo 'Lọc người không tương tác';
							continue;
						}
					}
					
					$cx_arr = explode('|', $bot['cam_xuc_su_dung']);
					$cam_xuc = $this->name_reactions($cx_arr[rand(0, count($cx_arr))]);

					$tt = json_decode($this->m_func->curl_api("https://graph.facebook.com/{$post['id']}/reactions?type=$cam_xuc&access_token={$bot['access_token']}&method=POST"), true);
					var_dump($tt);
				}
			}
		}
	}
function id_type($id, $token){
	$ok = json_decode($this->m_func->curl_api("https://graph.facebook.com/$id?access_token=$token&method=GET"), true);
	//print_r($ok);
	if(isset($ok['likes'])){
		 $return =  array(
		  	'type' => 'page',
		 );
	}elseif (isset($ok['icon'])) {
		 $return =  array(
		  	'type' => 'group',
		 );
	}else{
		 $return =  array(
		  	'type' => 'profile',
		  	'data' => array(
		  		'age' => '',
		  		'gender' => ''
		  	)
		 );
		 //Kiểm tra ngày sinh
		if(isset($ok['birthday'])){

		  $birthDate = explode("/", $ok['birthday']);
		  if(count($birthDate) > 0){
			  	if(count($birthDate) == 1){
			  		$ngay = 1;
			  		$thang = 1;
			  		$nam = $birthDate[0];
			  	}elseif (count($birthDate) == 2) {
			  		$ngay = 1;
			  		$thang = $birthDate[0];
			  		$nam = $birthDate[1];
			  	}else{
			  		$ngay = $birthDate[1];
			  		$thang = $birthDate[0];
			  		$nam = $birthDate[2];
			  	}
			//get age from date or birthdate
			$age = (date("md", date("U", mktime(0, 0, 0, $thang, $ngay, $nam))) > date("md")
			    ? ((date("Y") - $nam) - 1)
			    : (date("Y") - $nam));
			if($age > 100){
				 $return['data']['age'] = '';
			}else{
				$return['data']['age'] = $age;
			}

		  }else{
		  	$return['data']['age'];
		  }
		}
		//Kiểm tra giới tính
		if(isset($ok['gender'])){
			if($ok['gender'] == 'male'){
				$return['data']['gender'] = '0';
			}else{
				$return['data']['gender'] = '1';
			}
		}
		

	}
	return $return;
}

function name_reactions($id){
	switch ($id) {
	 		case 1:
	 			return 'LIKE';
	 			break;
	 		case 2:
	 			return 'LOVE';
	 			break;
	 		case 3:
	 			return 'ANGRY';
	 			break;
	 		case 4:
	 			return 'WOW';
	 			break;
	 		case 5:
	 			return 'SAD';
	 			break;
	 		case 6:
	 			return 'HAHA';
	 			break;
	 		default:
	 			return 'LOVE';
	 			break;
	 }
}

}

/* End of file BotReactionsPro.php */
/* Location: ./application/controllers/CronJobs/BotReactionsPro.php */