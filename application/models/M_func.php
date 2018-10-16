
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_func extends CI_Model {

	function return_json($arr, $exit = true){
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($arr);
		if($exit){
			exit();
		}
	}
	function info_member(){
		if($this->session->has_userdata('id_fb')){
			
			$id_fb = $this->session->userdata('id_fb');
			$this->db->where('id_fb', $id_fb);
			$get = $this->db->get('members');
			if($get->num_rows() > 0){
				return $get->result_array()[0];
			}else{
				return false;
			}

		}else{
			return false;
		}
	}
	function check_login(){
		if($this->session->has_userdata('id_fb')){
			$id_fb = $this->session->userdata('id_fb');
			$this->db->where('id_fb', $id_fb);
			$get = $this->db->get('members');
			if($get->num_rows() > 0){
				if($get->result_array()[0]['active'] == 0){
					return false;
				}
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	//Function get gia
	function get_gia($loai = 'auto_post'){
		$this->db->where('dich_vu', $loai);
		$get = $this->db->get('bang_gia');
		if($get->num_rows() > 0){
			return $get->result_array()[0]['gia_ngay'];
		}else{
			return false;
		}
	}
	//Kiem tra tai khoan
	function check_money($tien = 0, $id_fb = ''){


		if($id_fb == ''){
			$this->db->where('id_fb', $this->session->userdata('id_fb'));
		}else{
			$this->db->where('id_fb', $id_fb);
		}
		
		$get = $this->db->get('members');
		if($get->num_rows() > 0){
			if($get->result_array()[0]['money'] >= round($tien)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	//ham tru tien
	function tru_tien($so_tien, $id_fb = ''){
		if($id_fb == ''){
			$this->db->where('id_fb', $this->session->userdata('id_fb'));
		}else{
			$this->db->where('id_fb', $id_fb);
		}
		$this->db->set('money', 'money -'.round($so_tien).'', FALSE);
		return $this->db->update('members');
	}
	//check ton tai trong bang
	function isset_table($table, $field, $value){
		$this->db->where($field, $value);
		$get = $this->db->get($table);
		if($get->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	//get access token
	function get_access_token($id_fb){
		$this->db->where('id_fb', $id_fb);
		$get = $this->db->get('members');
		if($get->num_rows() > 0){
			return $get->result_array()[0]['access_token'];
		}else{
			return '';
		}
	}
	//upload image
	function upload_imgur($client_id,$pvars, $timeout=300){
		  $curl = curl_init(); 
		  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
		  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout); 
		  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id)); 
		  curl_setopt($curl, CURLOPT_POST, 1); 
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars); 
		  $out = curl_exec($curl); 
		  curl_close ($curl); 
		  $pms = json_decode($out,true); 
		  if(isset($pms['data']['link'])){
		  	return $pms['data']['link'];
		  }else{
		  	return false;
		  }
	}
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

}

/* End of file M_func.php */
/* Location: ./application/models/M_func.php */