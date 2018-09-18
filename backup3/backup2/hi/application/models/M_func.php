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
	 - Kiểm tra đăng nhập hay chưa
	*/
	 public function check_login($where){
	 	switch ($where) {
	 		case 'ctv':
	 			//Login with coookie
		 		if($this->input->cookie('c_session')!=''){

					if($this->input->cookie('c_email') != ''){

						$this->db->select('ctv_acc.id');
						$this->db->from('ctv_acc');
						$this->db->join('ctv_sessions','ctv_acc.email=ctv_sessions.c_email');
						$this->db->where('ctv_sessions.c_session', $this->input->cookie('c_session'));
						$this->db->where('ctv_acc.email', $this->input->cookie('c_email'));
						$query = $this->db->get();
						if($query->num_rows() > 0){

							$login_session = array(
								'ctv_id' => $query->result_array()[0]['id']
							);
							$this->session->set_userdata( $login_session );
							return true;
						}else{
							return false;
						}

					}else{
						return false;
					}

		 			
		 		}else{
		 			if($this->session->has_userdata('ctv_id')){
		 				$this->db->where('id', $this->session->userdata('ctv_id'));
		 				if($this->db->get('ctv_acc')->num_rows() > 0){
	                        return true;
		 				}else{
		 					session_destroy();
		 					return false;
		 				}
		 			}else{

		 				return false;
		 			}
		 		}

	 			break;
	 		case 'quanli':
		 			if($this->session->has_userdata('quanli_id')){
		 				$this->db->where('id', $this->session->userdata('quanli_id'));
		 				if($this->db->get('quanli_acc')->num_rows() > 0){
	                        return true;
		 				}else{
		 					session_destroy();
		 					return false;
		 				}
		 			}else{

		 				return false;
		 			}	
	 		break;	
	 		case 'admin':
		 			if($this->session->has_userdata('admin_id')){
		 				$this->db->where('id', $this->session->userdata('admin_id'));
		 				if($this->db->get('admin_acc')->num_rows() > 0){
	                        return true;
		 				}else{
		 					session_destroy();
		 					return false;
		 				}
		 			}else{

		 				return false;
		 			}	
	 		break;	
	 		default:
	 			# code...
	 			break;
	 	}
	 }
	/*
	 - Lấy thông tin đăng nhập
	*/
	 public function info_member($id, $where){
	 	switch ($where) {
	 		case 'ctv':
		 		$this->db->where('id', $id);
		 		$get = $this->db->get('ctv_acc');
		 		if($get->num_rows() > 0){
	                	return $get->result_array()[0];
		 		}else{
		 			session_destroy();
		 			exit('Có lỗi xảy ra! Thử đăng nhập lại! Code : 213');
		 		}
	 			break;
	 		case 'admin':
		 		$this->db->where('id', $id);
		 		$get = $this->db->get('admin_acc');
		 		if($get->num_rows() > 0){
	                	return $get->result_array()[0];
		 		}else{
		 			session_destroy();
		 			exit('Có lỗi xảy ra! Thử đăng nhập lại! Code : 213');
		 		}
	 		break;
	 		default:
	 			# code...
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
	 - Hàm lấy giá
	*/
    function get_gia($loai, $dl){
    	$this->db->where('dich_vu', $loai);
    	$get = $this->db->get('bang_gia');
    	if($get->num_rows() > 0){
    		$result = $get->result_array()[0];
    		if($dl == 'ctv'){
    			return $result['gia_ctv'];
    		}else{
    			return $result['gia_dl'];
    		}
    	}else{
    		exit('Khong co dinh gia cho dich vu nay');
    	}
    }

	/*
	 - Hàm kiểm tra tài khản
	*/
    function check_tien($so_tien, $id, $where){
    	switch ($where) {
    		case 'ctv':
    			$tien_co = $this->info_member($id, 'ctv')['money'];
    			if($tien_co < $so_tien){
    				return FALSE;
    			}else{
    				return TRUE;
    			}
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

	/*
	 - Hàm trừ tiền
	*/
	 function tru_tien($id, $so_tien, $where){
    	switch ($where) {
    		case 'ctv':
    			return $this->db->query("UPDATE `ctv_acc` SET `money` = `money` - $so_tien WHERE `id` = $id");
    			break;
    		
    		default:
    			# code...
    			break;
    	}
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
	 - Lấy tên CTV
	*/
	 function get_name_ctv($id){
	 	return $this->info_member($id, 'ctv')['name'];
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
	- Wait server
	*/
	 function wait_server($type = 'abc'){
	 	if($type == 'add'){
	 	 	$this->session->set_userdata('wait_send', 'trideptrai');
         	$this->session->mark_as_temp('wait_send', 1);
	 	}else{
	 		return $this->session->has_userdata('wait_send');
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
	- Time Ago
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
	- MD5 Creater
	*/	
	function creat_pass($pass){
		return md5('aa'.$pass.'bbcc');
	}

	/*
	- Curl Post
	*/
	function curl_post($url, $method, $postinfo){

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_HEADER, true);
	    curl_setopt($ch, CURLOPT_NOBODY, false);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	    if ($method == 'POST') {
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
	    }
	    $html = curl_exec($ch);
	  	$code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);
	    return $code;
	}
}

/* End of file M_func.php */
/* Location: ./application/models/M_func.php */