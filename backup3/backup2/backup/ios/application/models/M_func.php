<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_func extends CI_Model {

	function check_login(){
		if($this->session->has_userdata('id_fb')){
			return true;
		}else{
			return false;
		}
	}
	function info_member(){
				$this->db->where('id_fb', $this->session->userdata('id_fb'));
				if($this->db->get('account')->num_rows() > 0){
					return $this->db->get('account')->result_array()[0];
				}else{
					header('/Logout');
					exit('Đăng nhập lại!');
				}
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
}

/* End of file M_func.php */
/* Location: ./application/models/M_func.php */