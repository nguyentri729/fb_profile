
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_func extends CI_Model {
	public function _construct(){
		parent::__construct();
	}
	/*
	 - Gắn thông báo
	*/
	public function noti($status = '', $message =''){
		$noti =  array(
				'thongbao' => array(
					'status' => $status,
					'message' => $message
				)
		);
		$this->session->set_userdata($noti);
	}
	/*
	 - Trả thông báo
	*/
	public function noti_result($format = 'json'){

		switch ($format) {
			case 'json':
				if($this->session->has_userdata('thongbao')){
					$result =  json_encode($this->session->userdata('thongbao'));
				}else{
					$result =  json_encode(array('status' => false, 'message' => 'Có lỗi xảy ra trong quá trình xử lý.'));
				}
				header('Content-Type: application/json');
				$this->session->unset_userdata('thongbao');
				return $result;
				break;
			
			default:
				if($this->session->has_userdata('thongbao')){
					return $result =  $this->session->userdata('thongbao')['status'].' -- --- ---'.$this->session->userdata('thongbao')['message'];
				}else{
					return 'Không có thông báo';
				}
				$this->session->unset_userdata('thongbao');
				return $result;
				break;
		}
	}	
	/*
	 - hàm curl api
	*/
     function curl_api($url, $method = 'GET'){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOBODY, false);
           // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); 
           
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

	/*
	 - Hàm trả về thời gian còn lại
	*/
	public function time_remaining($so_giay){

		$conlai = $so_giay - time();
		if($conlai < 0){
			return 'Đã hết hạn';
		}
		$dt1 = new DateTime("@0");  
		$dt2 = new DateTime("@$conlai");  
		$ngay = $dt1->diff($dt2)->format('%a');
		$gio = $dt1->diff($dt2)->format('%h');
		$phut = $dt1->diff($dt2)->format('%i');
		$giay = $dt1->diff($dt2)->format('%s');
		if($ngay == '0' AND $gio != '0'){
			return "$gio giờ, $phut phút";
		}elseif ($gio == '0' AND $phut != '0'AND $ngay == '0') {
			if($phut == '1'){
				return 'một phút';
			}else{
				return "$phut phút";
			}
			
		}elseif ($phut == '0' AND $gio == '0' AND $ngay == '0') {

			return "$giay giây";
		}else{
			if($gio == 0){
				return "$ngay ngày";
			}else{
				return "$ngay ngày, $gio giờ";
			}
			
		}
		//return "$ngay ngày, $gio giờ";
	}
	/*
	 - Hàm phân tách cảm xúc
	*/
	 function split_reactions_to_img($list_cx){
	 	$cx = explode('|', $list_cx);
	 	if(count($cx) <= 0){
	 		return "Không có cảm xúc";
	 	}else{
	 		$cx_img = "";
	 		for ($i=0; $i < count($cx); $i++) { 
	 			$cx_img .= '<img src="/assets/images/icon_reactions/'.$cx[$i].'.gif" width="30" height="30">';
 	 		}
 	 		return $cx_img;
	 	}
	 }
	/*
	 - Lấy tên cảm xúc
	*/
	function name_reactions($id){
	 	switch ($id) {
	 		case 1:
	 			return 'Thích';
	 			break;
	 		case 2:
	 			return 'Yêu thích';
	 			break;
	 		case 3:
	 			return 'Phẫn nộ';
	 			break;
	 		case 4:
	 			return 'Ngạc nhiên';
	 			break;
	 		case 5:
	 			return 'Buồn';
	 			break;
	 		case 6:
	 			return 'Haha';
	 			break;
	 		default:
	 			return 'Không rõ';
	 			break;
	 	}
	 }
	/*
	- Lấy thông tin user_agent
	*/
	 function user_agent(){
		$this->load->library('user_agent');

		if ($this->agent->is_browser())
		{
		        $agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
		        $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
		        $agent = $this->agent->mobile();
		}
		else
		{
		        $agent = 'Unidentified User Agent';
		}

		return array(

			'agent' => $agent,
			'platform' => $this->agent->platform()
		);
	 }

	/*
	- Get uid từ URL
	*/
	function get_uid_from_url($url){

		if(is_numeric($url)){
			return $url;
		}

		$url_arr = parse_url($url);
		$uid = '';
		
		if(isset($url_arr['path'])){
			if($url_arr['path'] == '/profile.php'){
				
				if(isset($url_arr['query'])){
					
					parse_str($url_arr['query'], $ok);
					if(isset($ok['id'])){
						$uid = $ok['id'];
						
					}

				}
			}else{
				$username =  $url_arr['path'];
				$this->load->model('m_token');
				$token = $this->m_token->get_random_token();
				$uid = $this->m_graph->get_uid_from_username($username, $token);

			}
		}

		if(is_numeric($uid)){
			return $uid;
		}else{
			
			return false;
		}
	}

	/*
	- TimeAgo
	*/
	public function timeAgo($time_ago){
		  $cur_time 	= time();
		  $time_elapsed = $cur_time - $time_ago;
		  $seconds 		= $time_elapsed ;
		  $minutes 		= round($time_elapsed / 60 );
		  $hours 		= round($time_elapsed / 3600);
		  $days 		= round($time_elapsed / 86400 );
		  $weeks 		= round($time_elapsed / 604800);
		  $months 		= round($time_elapsed / 2600640 );
		  $years 		= round($time_elapsed / 31207680 );
		  // Seconds
		  if($seconds <= 60){
			return "$seconds giây trước";
		  }
		  //Minutes
		  else if($minutes <=60){
			if($minutes==1){
			  return "1 phút trước";
			}
			else{
			  return "$minutes phút trước";
			}
		  }
		  //Hours
		  else if($hours <=24){
			if($hours==1){
			  return "1 giờ trước";
			}else{
			  return "$hours giờ trước";
			}
		  }
		  //Days
		  else if($days <= 7){
			if($days==1){
			  return "hôm qua";
			}else{
			  return "$days ngày trước";
			}
		  }
		  //Weeks
		  else if($weeks <= 4.3){
			if($weeks==1){
			  return "1 tuần trước";
			}else{
			  return "$weeks tuần trước";
			}
		  }
		  //Months
		  else if($months <=12){
			if($months==1){
			  return "1 tháng trước";
			}else{
			  return "$months tháng trước";
			}
		  }
		  //Years
		  else{
			if($years==1){
			  return "1 năm trước";
			}else{
			  return "$years năm trước";
			}
		  }
	}

	/*
	- Check Login
	*/
	function check_login(){
		if($this->session->has_userdata('id') AND $this->session->has_userdata('access_token')){
			/*$token = $this->session->userdata('access_token');
			$profile = json_decode($this->curl_api("https://graph.facebook.com/me?access_token=$token&method=GET"), true);
			if(isset($profile['id'])){
				return true;
			}else{
				session_destroy();
				return false;
			}*/
			return true;
		}else{
			return false;
		}
	}

	function check_token(){
		$token = $this->session->userdata('access_token');
			$profile = json_decode($this->curl_api("https://graph.facebook.com/me?access_token=$token&method=GET"), true);
			if(isset($profile['id'])){
				return true;
			}else{
				session_destroy();
				exit('Error');
				return false;
			}
	}
	function get_info($id){
		$this->db->where('id_fb', $id);
		$get = $this->db->get('access_token');
		if($get->num_rows() > 0){
			return $get->result_array()[0];
		}else{
			session_destroy();
			exit('Lỗi ! Exit 221');
		}
	}
}

/* End of file M_func.php */
/* Location: ./application/models/M_func.php */